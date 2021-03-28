<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Jurusan;

class JurusanController extends Controller
{
    private $validate = [
        'nama' => 'required'
    ];

    public function viewData() {
        return view('admin.jurusan.data', [
            'data' => Jurusan::all()
        ]);
    }

    public function create(Request $r) {
        $r->validate($this->validate);

        Jurusan::create([
            'nama' => $r->nama
        ]);

        return redirect()->route('view.data.jurusan');
    }

    public function detail(Jurusan $data) {
        return view('admin.jurusan.detail', [
            'data' => $data
        ]);
    }

    public function update(Request $r, Jurusan $data) {
        $r->validate($this->validate);

        $data->nama = $r->nama;
        $data->save();

        return redirect()->route('view.data.jurusan');
    }

    public function delete(Jurusan $data) {
        $data->delete();

        return redirect()->route('view.data.jurusan');
    }
}
