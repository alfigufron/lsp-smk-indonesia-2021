<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Kelas;
use App\Vkelas;
use App\Jurusan;

class KelasController extends Controller
{
    private $validate = [
        'nama' => 'required',
        'jurusan' => 'required'
    ];

    public function viewData() {
        return view('admin.kelas.data', [
            'data' => Vkelas::all(),
            'data_jurusan' => Jurusan::all()
        ]);
    }

    public function create(Request $r) {
        $r->validate($this->validate);

        Kelas::create([
            'nama' => $r->nama,
            'id_jurusan' => $r->jurusan
        ]);

        return redirect()->route('view.data.kelas');
    }

    public function detail(Kelas $data) {
        return view('admin.kelas.detail', [
            'data' => $data,
            'data_jurusan' => Jurusan::all()
        ]);
    }

    public function update(Request $r, Kelas $data) {
        $r->validate($this->validate);

        $data->nama = $r->nama;
        $data->id_jurusan = $r->jurusan;
        $data->save();

        return redirect()->route('view.data.kelas');
    }

    public function delete(Kelas $data) {
        $data->delete();

        return redirect()->route('view.data.kelas');
    }
}
