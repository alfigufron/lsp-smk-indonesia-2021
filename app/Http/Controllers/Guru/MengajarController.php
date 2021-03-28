<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Vmengajar;

class MengajarController extends Controller
{
    public function viewData(Request $r) {
        $user = $r->session()->get('user');
        
        return view('guru.mengajar.data', [
            'data' => Vmengajar::where('nip', $user->nip)->get()
        ]);
    }
}
