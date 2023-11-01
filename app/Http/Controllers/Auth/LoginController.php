<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected $redirectTo = RouteServiceProvider::HOME;
//ini untuk rederect jika pengguna adalah admin, maka ke admin, jikauser ke user
    protected function redirectTo()
    {
        if (auth()->user()->role == 'admin') {
            return '/admin';
        } else {
            return '/user';
        }
    }

   

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email', // Menambahkan validasi bahwa 'email' harus berupa alamat email.
            'password' => 'required|string',
        ], [
            'email.required' => 'Email harus diisi.', // Pesan kesalahan kustom jika email tidak diisi.
            'email.email' => 'Email harus berupa alamat email yang valid.', // Pesan kesalahan kustom jika email tidak valid.
            'password.required' => 'Password harus diisi.', // Pesan kesalahan kustom jika password tidak diisi.
        ]);
    }



    protected function authenticated(Request $request, $user)
{
    // Menyimpan pesan sukses di session untuk ditampilkan setelah pengguna berhasil login.
    Session::flash('success', 'Selamat datang, Anda telah berhasil login!');

    if ($user->role == 'admin') {
        return redirect('/admin');
    } else {
        return redirect('/user');
    }
}
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }
}
