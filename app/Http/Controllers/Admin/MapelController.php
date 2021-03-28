<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Mapel;

class MapelController extends Controller
{
    private $validate = [
        'kode' => 'required|unique:mapel',
        'nama' => 'required'
    ];

    public function viewData() {
        return view('admin.mapel.data', [
            'data' => Mapel::all()
        ]);
    }

    public function create(Request $r) {
        $r->validate($this->validate);

        Mapel::create([
            'kode' => $r->kode,
            'nama' => $r->nama
        ]);

        return redirect()->route('view.data.mapel');
    }

    public function detail(Mapel $data) {
        return view('admin.mapel.detail', [
            'data' => $data
        ]);
    }

    public function update(Request $r, Mapel $data) {
        $r->validate($this->validate);

        $data->kode = $r->kode;
        $data->nama = $r->nama;
        $data->save();

        return redirect()->route('view.data.mapel');
    }

    public function delete(Mapel $data) {
        $data->delete();

        return redirect()->route('view.data.mapel');
    }
}
