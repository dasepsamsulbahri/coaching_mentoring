<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function refreshCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }

    public function login(Request $request)
    {
        request()->validate([
            'nip'       => 'required',
            'password'  => 'required',
            'captcha'   => 'required|captcha'
        ],
        ['captcha.captcha'=>'Invalid captcha code.']);

        $credentials = $request->validate([
            'nip'       => ['required'],
            'password'  => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('home.index');
        }

        throw ValidationException::withMessages([
            'nip' => __('auth.failed'),
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Alert::success('Hore!', 'Logout successfuly.');
        return redirect('login');
    }
}
