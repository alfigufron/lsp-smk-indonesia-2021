<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Guru;

class GuruController extends Controller
{
    private $validate = [
        'nama' => 'required',
        'jenis_kelamin' => 'required',
        'alamat' => 'required',
        'password' => 'required',
    ];

    public function viewData() {
        return view('admin.guru.data', [
            'data' => Guru::all()
        ]);
    }

    public function create(Request $r) {
        $this->validate['nomor_induk_pegawai'] = 'required|unique:guru,nip';
        $r->validate($this->validate);

        Guru::create([
            'nip' => $r->nomor_induk_pegawai,
            'nama' => $r->nama,
            'jk' => $r->jenis_kelamin,
            'alamat' => $r->alamat,
            'password' => $r->password
        ]);

        return redirect()->route('view.data.guru');
    }

    public function detail(Guru $data) {
        return view('admin.guru.detail', [
            'data' => $data
        ]);
    }

    public function update(Request $r, Guru $data) {
        $r->validate($this->validate);

        $data->nama = $r->nama;
        $data->jk = $r->jenis_kelamin;
        $data->alamat = $r->alamat;
        $data->password = $r->password;
        $data->save();

        return redirect()->route('view.data.guru');
    }

    public function delete(Guru $data) {
        $data->delete();

        return redirect()->route('view.data.guru');
    }
}
