<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Vnilai;

class NilaiController extends Controller
{
    public function viewData(Request $r) {
        $user = $r->session()->get('user');

        return view('siswa.nilai.data', [
            'data' => Vnilai::where('nis', $user->nis)->get()
        ]);
    }
}
