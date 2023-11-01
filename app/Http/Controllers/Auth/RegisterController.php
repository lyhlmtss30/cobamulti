<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'name.required' => 'Kolom Nama harus diisi.',
            'name.string' => 'Kolom Nama harus berupa teks.',
            'name.max' => 'Kolom Nama tidak boleh lebih dari :max karakter.',
            'email.required' => 'Kolom Email harus diisi.',
            'email.string' => 'Kolom Email harus berupa teks.',
            'email.email' => 'Kolom Email harus berupa alamat email yang valid.',
            'email.max' => 'Kolom Email tidak boleh lebih dari :max karakter.',
            'email.unique' => 'Email sudah terdaftar. Silakan gunakan email lain.',
            'password.required' => 'Kolom Password harus diisi.',
            'password.string' => 'Kolom Password harus berupa teks.',
            'password.min' => 'Kolom Password minimal harus :min karakter.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai dengan kolom password.',
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);



    }
}
