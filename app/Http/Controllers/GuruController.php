<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function data_guru()
    {
        $data = User::where('role','guru')->get();

        return view('guru.guru_index',[
            'title'     => 'Data Guru',
            'data'      => $data,

        ]);
    }
}
