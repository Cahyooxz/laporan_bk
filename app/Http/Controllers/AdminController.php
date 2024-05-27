<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function data_admin()
    {
        $data = User::where('role','admin')->get();

        return view('admin.admin_index',[
            'title'     => 'Data Admin',
            'data'      => $data,

        ]);
    }
}
