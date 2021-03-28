<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Admin;
use App\Guru;
use App\Siswa;

class AuthController extends Controller
{
    private
        $arr_role = ['admin', 'guru', 'siswa'],

        $validate = [
            'admin' => [
                'username' => 'required',
                'password' => 'required',
            ],
            'guru' => [
                'nomor_induk_pegawai' => 'required',
                'password' => 'required',
            ],
            'siswa' => [
                'nomor_induk_siswa' => 'required',
                'password' => 'required',
            ]
        ];

    public function viewLogin(Request $r, $role) {
        if (!in_array($role, $this->arr_role))
            return abort(404);

        if ($r->session()->has('user') && $r->session()->get('role') === $role)
            return redirect()->route('home', $role);

        return view('login', [
            'role' => $role
        ]);
    }

    public function login(Request $r, $role) {
        $r->validate($this->validate[$role]);

        $auth = "";

        if ($role === 'admin')
            $auth = Admin::where([['username', $r->username], ['password', $r->password]])->first();

        if ($role === 'guru')
            $auth = Guru::where([['nip', $r->nomor_induk_pegawai], ['password', $r->password]])->first();

        if ($role === 'siswa')
            $auth = Siswa::where([['nis', $r->nomor_induk_siswa], ['password', $r->password]])->first();

        if (!$auth)
            return redirect()->route('login', $role);

        session([
            'user' => $auth,
            'role' => $role
        ]);

        return redirect()->route('home', $role);
    }

    public function logout(Request $r) {
        $role = $r->session()->get('role');

        if ($role)
            session()->forget(['user', 'role']);

        return redirect()->route('login', $role);
    }

    public function home(Request $r, $role) {
        if (!in_array($role, $this->arr_role))
            return abort(404);

        if (!$r->session()->has('user') || $r->session()->get('role') !== $role)
            return redirect()->route('view.login', $role);

        return view("$role.home");
    }
}
