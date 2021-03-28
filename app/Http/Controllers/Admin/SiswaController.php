<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Vsiswa;
use App\Vkelas;
use App\Siswa;

class SiswaController extends Controller
{
    private $validate = [
        'nama' => 'required',
        'jenis_kelamin' => 'required',
        'alamat' => 'required',
        'password' => 'required',
        'kelas' => 'required'
    ];

    public function viewData() {
        return view('admin.siswa.data', [
            'data' => Vsiswa::all(),
            'data_kelas' => Vkelas::all()
        ]);
    }

    public function create(Request $r) {
        $this->validate['nomor_induk_siswa'] = 'required|unique:siswa,nis';
        $r->validate($this->validate);

        Siswa::create([
            'nis' => $r->nomor_induk_siswa,
            'nama' => $r->nama,
            'jk' => $r->jenis_kelamin,
            'alamat' => $r->alamat,
            'password' => $r->password,
            'id_kelas' => $r->kelas,
        ]);

        return redirect()->route('view.data.siswa');
    }

    public function detail(Siswa $data) {
        return view('admin.siswa.detail', [
            'data' => $data,
            'data_kelas' => Vkelas::all()
        ]);
    }

    public function update(Request $r, Siswa $data) {
        $r->validate($this->validate);

        $data->nama = $r->nama;
        $data->jk = $r->jenis_kelamin;
        $data->alamat = $r->alamat;
        $data->password = $r->password;
        $data->id_kelas = $r->kelas;
        $data->save();

        return redirect()->route('view.data.siswa');
    }

    public function delete(Siswa $data) {
        $data->delete();

        return redirect()->route('view.data.siswa');
    }
}
