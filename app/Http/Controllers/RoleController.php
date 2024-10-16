<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
	{
    	$data['role'] = DB::table('model_has_roles')
        ->join('users', 'model_has_roles.model_id', '=' ,'users.id')
        ->join('roles', 'model_has_roles.role_id','=','roles.id')
        ->select('roles.name AS nama_role', 'model_has_roles.*', 'users.id', 'users.name')
        ->get();
 
    	// mengirim data pegawai ke view index
        return view('backend.roles.indexRoles', $data);
	}
 
	// method untuk edit data pegawai
	public function edit($model_id)
	{
		// mengambil data pegawai berdasarkan id yang dipilih
		$role = DB::table('model_has_roles')
        // ->join('roles', 'model_has_role.role_id', '=', 'roles.id')
        ->where('model_id',$model_id)->get();
		return view('backend.roles.editRoles', compact('role'));
	}
 
	// update data pegawai
	public function update(Request $request)
	{
		// update data pegawai
		DB::table('model_has_roles')->where('model_id',$request->model_id)->update([
			'role_id' => $request->role_id,
			'model_type' => $request->model_type,
		]);

        return redirect()->route('role.index');
	}
}
