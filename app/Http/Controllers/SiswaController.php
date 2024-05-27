<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function data_siswa()
    {
        $data = User::where('role','siswa')->get();

        return view('siswa.siswa_index',[
            'title'     => 'Data Siswa',
            'data'      => $data,

        ]);
    }
}
