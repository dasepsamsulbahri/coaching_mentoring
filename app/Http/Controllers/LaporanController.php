<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Laporan;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    public function index(){
        $user = User::find(Auth::user()->id);

        if ($user->hasRole('Peserta')){
            $laporan = DB::table('pesertas')
                // ->join('users', 'pesertas.id_mentor', '=', 'users.id')
                ->join('kegiatans', 'pesertas.id_kegiatan', '=', 'kegiatans.id')
                ->join('reports', 'pesertas.id', '=', 'reports.id_peserta')
                ->where('nip', '=', Auth::user()->nip)
                    ->get();
        }elseif($user->hasRole('Mentor')){
            $laporan = DB::table('pesertas')
                // ->join('users', 'pesertas.id_mentor', '=', 'users.id')
                ->join('kegiatans', 'pesertas.id_kegiatan', '=', 'kegiatans.id')
                ->join('reports', 'pesertas.id', '=', 'reports.id_peserta')
                ->where('id_mentor', '=', Auth::user()->id)
                ->get();
        }else{
            $laporan = DB::table('pesertas')
                // ->join('users', 'pesertas.id_mentor', '=', 'users.id')
                ->join('kegiatans', 'pesertas.id_kegiatan', '=', 'kegiatans.id')
                ->join('laporans', 'pesertas.id', '=', 'laporans.id_peserta')
                ->get();
        }

        return view('backend.laporan.indexLaporan', compact('laporan'));
    }

    public function create(){
       
    }
    public function create_laporan(string $id){
        $peserta = Peserta::findOrFail($id);
        
        return view('backend.laporan.createLaporan', compact('peserta'));
    }

    public function store(Request $request){
        $request->validate([
            'id_peserta'    => 'required',
            'id_kegiatan'   => 'required',
            'title'         => 'required',
            'description'   => 'required',
            'status'        => 'required',
            'keterangan'    => 'required',
            'file'          => 'required|file|mimes:pdf|max:10240'
        ],[
            'title.required'        =>'Title harus diisi!',
            'description.required'  =>'Description harus diisi!',
            'file.required'         =>'Silahkan upload file dalam format pdf!',
        ]);

        $file = $request->file('file');
        $file->storeAs('public/laporan', $file->hashName());

        Laporan::create([
            'id_peserta'    => $request->id_peserta,
            'id_kegiatan'   => $request->id_kegiatan,
            'title'         => $request->title,
            'description'   => $request->description,
            'status'        => $request->status,
            'keterangan'    => $request->keterangan,
            'file'          => $file->hashName(),
        ]);

        return redirect()->route('laporan.index')->with(['success' => 'Your report has been uploaded!']);
    }

    public function edit(string $id){
        $laporan = Laporan::findOrFail($id);

        return view('backend.laporan.editLaporan', compact('laporan'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'id_peserta'    => 'required',
            'id_kegiatan'   => 'required',
            'title'         => 'required',
            'description'   => 'required',
            'status'        => 'required',
            'keterangan'    => 'required',
            'file'          => 'file|mimes:pdf|max:10240'
        ],[
            'title.required'        =>'Title harus diisi!',
            'description.required'  =>'Description harus diisi!',
            'file.required'         =>'Silahkan upload file dalam format pdf!',
        ]);

        $laporan = Laporan::findOrFail($id);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file->storeAs('public/laporan', $file->hashName());

            Storage::delete('public/laporan/'.$laporan->image);

            $laporan->update([
                'id_peserta'    => $request->id_peserta,
                'id_kegiatan'   => $request->id_kegiatan,
                'title'         => $request->title,
                'description'   => $request->description,
                'status'        => $request->status,
                'keterangan'    => $request->keterangan,
                'file'          => $file->hashName()
            ]);
        }else{
            $laporan->update([
                'id_peserta'    => $request->id_peserta,
                'id_kegiatan'   => $request->id_kegiatan,
                'title'         => $request->title,
                'description'   => $request->description,
                'status'        => $request->status,
                'keterangan'    => $request->keterangan
            ]);
        }

        return redirect()->route('laporan.index')->with(['success' => 'Your report has been updated!']);
    }

    public function show(string $id){
        $laporan = Laporan::findOrFail($id);
        return view('backend.laporan.showLaporan', compact('laporan'));
    }
}
