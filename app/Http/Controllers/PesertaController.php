<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Imports\PesertaImport;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PesertaController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::user()->id);
        if ($user->hasRole('Peserta')) {
            $peserta = DB::table('kegiatans')
            ->join('pesertas', 'kegiatans.id', '=', 'pesertas.id_kegiatan')
            ->where('nip', '=', Auth::user()->nip)
            ->get();
        }elseif($user->hasRole('Peserta')){
            $peserta = DB::table('pesertas')
            ->join('kegiatans', 'pesertas.id_kegiatan', '=', 'kegiatans.id')
            ->where('id_mentor', '=', Auth::user()->id)
            // ->join('pesertas', 'users.id', '=', 'pesertas.id_mentor')
            ->get();
        }else{
            $peserta = DB::table('pesertas')
            ->join('kegiatans', 'pesertas.id_kegiatan', '=', 'kegiatans.id')
            // ->join('pesertas', 'users.id', '=', 'pesertas.id_mentor')
            ->get();
        }

        return view('backend.peserta.indexPeserta', compact('peserta'));
    }

    public function create_peserta(string $id): View
    {
        $kegiatan = Kegiatan::findOrFail($id);
        
        return view('backend.peserta.createPeserta', compact('kegiatan'));
    }
    
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nip' => [
                'required',
                Rule::unique('pesertas')->where(function ($query) use ($request) {
                    return $query->where('id_kegiatan', $request->id_kegiatan);
                }),
            ],
            'id_kegiatan'       => 'required|numeric',
            'id_mentor'         => 'required|numeric',
            'nama_peserta'              => 'required',
            'unit_kerja'        => 'required',
            'satuan_kerja'      => 'required',
            'jabatan'           => 'required',
            'pangkat'           => 'required',
            'golongan'          => 'required'
        ]);

        Peserta::create([
            'id_kegiatan'   => $request->id_kegiatan,
            'id_mentor'     => $request->id_mentor,
            'nip'           => $request->nip,
            'nama_peserta'  => $request->nama_peserta,
            'unit_kerja'    => $request->unit_kerja,
            'satuan_kerja'  => $request->satuan_kerja,
            'jabatan'       => $request->jabatan,
            'pangkat'       => $request->pangkat,
            'golongan'      => $request->golongan
           
        ]);

        return redirect()->route('peserta.index')->with(['success' => 'Your data has been added!']);
    }

    public function import()
    {
        return view('backend.peserta.importPeserta');
    }
    public function store_import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_peserta di dalam folder public
		$file->move('file_peserta',$nama_file);
 
		// import data
		Excel::import(new PesertaImport, public_path('/file_peserta/'.$nama_file));
 
		return redirect()->route('peserta.index')->with(['success' => 'Data berhasil diimpor!']);
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id): View
    {
        $peserta = Peserta::findOrFail($id);
        return view('backend.peserta.editPeserta', compact('peserta'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'nip'           => 'required',
            'nama_peserta'          => 'required',
            'unit_kerja'    => 'required',
            'satuan_kerja'  => 'required',
            'jabatan'       => 'required',
            'pangkat'        => 'required',
            'golongan'      => 'required'
        ]);

        //get product by ID
        $peserta = Peserta::findOrFail($id);
        
        $peserta->update([
            'nip'           => $request->nip,
            'nama_peserta'          => $request->nama_peserta,
            'unit_kerja'    => $request->unit_kerja,
            'satuan_kerja'  => $request->satuan_kerja,
            'jabatan'       => $request->jabatan,
            'pangkat'       => $request->pangkat,
            'golongan'      => $request->golongan,
        ]);
        
        return redirect()->route('peserta.index')->with(['success' => 'Your data has been updated!']);
    }

    public function destroy($id): RedirectResponse
    {
        //get product by ID
        $peserta = Peserta::findOrFail($id);

        //delete product
        $peserta->delete();

        //redirect to index
        return redirect()->route('peserta.index')->with(['success' => 'Your data has been deleted!']);
    }
}
