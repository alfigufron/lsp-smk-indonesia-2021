<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Vnilai;
use App\Mengajar;
use App\Nilai;
use App\Siswa;

class NilaiController extends Controller
{
    private $validate = [
        'ulangan_harian' => 'required',
        'ujian_tengah_semester' => 'required',
        'ujian_akhir_semester' => 'required'
    ];

    private function finalScore($uh, $uts, $uas) {
        $na = ($uh + $uts + $uas) / 3;

        return number_format($na, 2);
    }

    public function viewData(Mengajar $data_mengajar) {
        $arr_nilai = [];
        $nilai = Nilai::where('id_mengajar', $data_mengajar->id)->get();

        foreach ($nilai as $key => $item)
            $arr_nilai[$key] = $item->id;

        return view('guru.nilai.data', [
            'data' => Vnilai::whereIn('id', $arr_nilai)->get(),
            'data_siswa' => Siswa::where('id_kelas', $data_mengajar->id_kelas)->get(),
            'data_mengajar' => $data_mengajar
        ]);
    }

    public function create(Request $r, Mengajar $data_mengajar) {
        $this->validate['siswa'] = 'required';
        $r->validate($this->validate);

        Nilai::create([
            'uh' => $r->ulangan_harian,
            'uts' => $r->ujian_tengah_semester,
            'uas' => $r->ujian_akhir_semester,
            'na' => $this->finalScore($r->ulangan_harian, $r->ujian_tengah_semester, $r->ujian_akhir_semester),
            'id_mengajar' => $data_mengajar->id,
            'nis' => $r->siswa
        ]);

        return redirect()->route('view.data.nilai', $data_mengajar->id);
    }

    public function detail(Mengajar $data_mengajar, Nilai $data_nilai) {
        return view('guru.nilai.detail', [
            'data' => $data_nilai,
            'data_siswa' => Siswa::where('id_kelas', $data_mengajar->id_kelas)->get(),
            'data_mengajar' => $data_mengajar
        ]);
    }

    public function update(Request $r, Mengajar $data_mengajar, Nilai $data_nilai) {
        $r->validate($this->validate);

        $data_nilai->uh = $r->ulangan_harian;
        $data_nilai->uts = $r->ujian_tengah_semester;
        $data_nilai->uas = $r->ujian_akhir_semester;
        $data_nilai->na = $this->finalScore($r->ulangan_harian, $r->ujian_tengah_semester, $r->ujian_akhir_semester);
        $data_nilai->save();

        return redirect()->route('view.data.nilai', $data_mengajar->id);
    }

    public function delete(Mengajar $data_mengajar, Nilai $data_nilai) {
        $data_nilai->delete();

        return redirect()->route('view.data.nilai', $data_mengajar->id);
    }
}
