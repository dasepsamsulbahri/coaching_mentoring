<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $user = User::orderBy('name', 'ASC')->paginate(10);
        return view('backend.user.indexUser', compact('user'));
    }
    
    public function create(){
        return view('backend.user.createUser');
    }

    public function store(Request $request){
        $request->validate([
            'nip'       => ['required', 'numeric', 'min:18', 'unique:users'],
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'nip'       => $request->nip,
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);
        $user->assignRole('Mentor');
        return redirect()->route('users.index')->with(['success' => 'Data berhasil ditambahkan']);
    }

    public function edit(User $user){
        return view('backend.user.editUser', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nip'       => 'required',
            'name'      => 'required', 'string', 'max:255',
            'email'     => 'required', 'string', 'email', 'max:255',
            'image'     => 'image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $user = User::findOrFail($id);

        if ($request->hasFile('image')) {
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/mentor', $image->hashName());

            //delete old image
            Storage::delete('public/mentor/'.$user->image);

            $user->update([
                'nip'       => $request->nip,
                'name'      => $request->name,
                'email'     => $request->email,
                'image'     => $image->hashName()
            ]);

        }else{
            $user->update([
                'nip'       => $request->nip,
                'name'      => $request->name,
                'email'     => $request->email,
            ]);
        }

        return redirect()->route('users.index')->with(['success' => 'Data berhasil diubah']);
    }

    public function show(string $id)
    {
        //
    }

    public function destroy($id) : RedirectResponse
    {
         //get post by ID
         $post = User::findOrFail($id);
 
         //delete post
         $post->delete();

        return redirect()->route('users.index')->with(['success' => 'Data berhasil dihapus']);
    }

    public function user_import(){
        return view('backend.user.import_user');
    }

    public function store_user_import(Request $request)
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
		Excel::import(new UsersImport, public_path('/file_peserta/'.$nama_file));
 
		return redirect()->route('users.index')->with(['success' => 'Data berhasil diimpor!']);
    }
}
