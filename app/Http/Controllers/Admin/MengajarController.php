<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Vmengajar;
use App\Vkelas;
use App\Mapel;
use App\Guru;
use App\Mengajar;

class MengajarController extends Controller
{
    private $validate = [
        'guru' => 'required',
        'mata_pelajaran' => 'required',
        'kelas' => 'required',
    ];

    private function existData($mapel, $kelas) {
        return Mengajar::where([
            ['id_mapel', $mapel],
            ['id_kelas', $kelas]
        ])->first();
    }

    public function viewData() {
        return view('admin.mengajar.data', [
            'data' => Vmengajar::all(),
            'data_guru' => Guru::all(),
            'data_mapel' => Mapel::all(),
            'data_kelas' => Vkelas::all()
        ]);
    }

    public function create(Request $r) {
        $r->validate($this->validate);

        if ($this->existData($r->mata_pelajaran, $r->kelas))
            return redirect()
                ->route('view.data.mengajar')
                ->withErrors(['Exist Data']);

        Mengajar::create([
            'nip' => $r->guru,
            'id_mapel' => $r->mata_pelajaran,
            'id_kelas' => $r->kelas
        ]);

        return redirect()->route('view.data.mengajar');
    }

    public function detail(Mengajar $data) {
        return view('admin.mengajar.detail', [
            'data' => $data,
            'data_guru' => Guru::all(),
            'data_mapel' => Mapel::all(),
            'data_kelas' => Vkelas::all()
        ]);
    }

    public function update(Request $r, Mengajar $data) {
        $r->validate($this->validate);

        if ("$data->id_mapel" !== $r->mata_pelajaran || "$data->id_kelas" !== $r->kelas)
            if ($this->existData($r->mata_pelajaran, $r->kelas))
                return redirect()
                    ->route('detail.data.mengajar', $data->id)
                    ->withErrors(['Exist Data']);

        $data->nip = $r->guru;
        $data->id_mapel = $r->mata_pelajaran;
        $data->id_kelas = $r->kelas;
        $data->save();

        return redirect()->route('view.data.mengajar');
    }

    public function delete(Mengajar $data) {
        $data->delete();

        return redirect()->route('view.data.mengajar');
    }
}
