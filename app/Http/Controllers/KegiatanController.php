<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class KegiatanController extends Controller
{
    public function index()
    {
        
        $user = User::find(Auth::user()->id);
    
        if ($user->hasRole('Admin')) {
            $kegiatan = DB::table('users')
            ->join('kegiatans', 'users.id', '=', 'kegiatans.id_mentor')
            ->get();
        } elseif($user->hasRole('Mentor')) {
            $kegiatan = DB::table('users')
            ->join('kegiatans', 'users.id', '=', 'kegiatans.id_mentor')
            ->where('nip', '=', Auth::user()->nip)
            ->get();
        } elseif($user->hasRole('Super Admin')) {
            $kegiatan = DB::table('users')
            ->join('kegiatans', 'users.id', '=', 'kegiatans.id_mentor')
            ->get();
        }else{
            $kegiatan = DB::table('pesertas')
            ->join('kegiatans', 'pesertas.id_kegiatan', '=', 'kegiatans.id')
            ->where('nip', '=', Auth::user()->nip)
            ->get();
        }

        return view('backend.kegiatan.indexKegiatan', compact('kegiatan'));
    }
    
    public function create()
    {
        $mentor = DB::table('users')
        ->join('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
        ->where('model_has_roles.role_id', '=', 3)
        ->get();
        
        return view('backend.kegiatan.createKegiatan', compact('mentor'));
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_mentor'         => 'required',
            'nama_kegiatan'     => 'required',
            'jml_pertemuan'     =>'required',
            'metode_diskusi'    =>'required'
        ]);

        Kegiatan::create($request->all());

        return redirect()->route('kegiatan.index')->with(['success' => 'Your data has been added!']);
    }

    public function show(string $id)
    {

    }
    
    public function edit(string $id): View
    {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('backend.kegiatan.editKegiatan', compact('kegiatan'));
    }

    public function update(Request $request, Kegiatan $kegiatan)
    {
        $request->validate([
            'id_mentor'         => 'required',
            'nama_kegiatan'     => 'required',
            'jml_pertemuan'     =>'required',
            'metode_diskusi'    =>'required'
        ]);

        $kegiatan->update($request->all());

        return redirect()->route('kegiatan.index')->with(['success' => 'Your data has been updated!']);
    }

    public function destroy($id): RedirectResponse
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->delete();

        return redirect()->route('kegiatan.index')->with(['success' => 'Your data has been deleted!']);
    }

    public function create_peserta(){
        return view('backend.kegiatan.addPeserta');
    }
}
