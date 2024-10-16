<?php

namespace App\Http\Controllers;

use App\Models\mentor;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class MentorController extends Controller
{
    public function index()
    {
        $mentor = DB::table('users')
                ->join('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
                ->where('model_has_roles.role_id', '=', 3)
                ->get();

        return view('backend.mentor.indexMentor', compact('mentor'));
    }

    public function create()
    {
        return view('backend.mentor.createMentor');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'nip'       => 'required', 'numeric', 'min:18', 'unique:users',
            'name'      => 'required', 'string', 'max:255',
            'email'     => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password'  => 'required', 'string', 'min:8', 'confirmed',
        ]);

        // dd($request);

        $image = $request->file('image');
        $image->storeAs('public/mentor', $image->hashName());

        $user = User::create([
            'image'     => $image->hashName(),
            'nip'       => $request->nip,
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);

        $user->assignRole('Mentor');

        return redirect()->route('mentor.index')->with(['success' => 'Data Mentor Berhasil Ditambahkan!']);
    }

    public function show(string $id)
    {
        //
    }

   
    public function edit(string $id): View
    {
        $mentor = mentor::findOrFail($id);

        return view('backend.mentor.editMentor', compact('mentor'));
    }

    public function update(Request $request, mentor $mentor)
    {
        $request->validate([
            'nip' => 'required|numeric|digits:18|unique:mentors',
            'name' => 'required'
        ]);

        $mentor->update($request->all());

        return redirect()->route('mentor.index')->with(['success' => 'Data berhasil diubah']);
    }

    public function destroy($id): RedirectResponse
    {
        $mentor = mentor::findOrFail($id);
        $mentor->delete();

        return redirect()->route('mentor.index')->with(['success' => 'Data mentor berhasil dihapus!']);
    }
}
