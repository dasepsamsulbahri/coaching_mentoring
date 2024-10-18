<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Laporan;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function index(){
        $user = User::find(Auth::user()->id);

        if ($user->hasRole('Peserta')){
            $laporan = DB::table('pesertas')
                // ->join('users', 'pesertas.id_mentor', '=', 'users.id')
                ->join('kegiatans', 'pesertas.id_kegiatan', '=', 'kegiatans.id')
                ->join('laporans', 'pesertas.id', '=', 'laporans.id_peserta')
                ->where('nip', '=', Auth::user()->nip)
                    ->get();
        }elseif($user->hasRole('Mentor')){
            $laporan = DB::table('pesertas')
                // ->join('users', 'pesertas.id_mentor', '=', 'users.id')
                ->join('kegiatans', 'pesertas.id_kegiatan', '=', 'kegiatans.id')
                ->join('laporans', 'pesertas.id', '=', 'laporans.id_peserta')
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

    public function create(string $id){
        $peserta = Peserta::findOrFail($id);
        
        return view('backend.laporan.createLaporan', compact('peserta'));
    }

    public function store(Request $request){
        $request->validate([
            'id_peserta'    => 'required',
            'id_kegiatan'   => 'required',
            'id_mentor'     => 'required',
            'status'        => 'required',
            'title'         => 'required',
            'description'   => 'required',
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
            'id_mentor'     => $request->id_mentor,
            'status'        => $request->status,
            'title'         => $request->title,
            'description'   => $request->description,
            'file'          => $file->hashName(),
        ]);

        return redirect()->route('laporan.index')->with(['success' => 'Your report has been uploaded!']);
    }

    public function show(string $id){
        $laporan = Laporan::findOrFail($id);
        return view('backend.laporan.showLaporan', compact('laporan'));
    }
}
