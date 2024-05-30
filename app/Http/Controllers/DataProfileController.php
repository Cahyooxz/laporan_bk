<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function admin()
    {
        return view('data-profile.profile.profile-admin',[
            'title' => 'Data Profile Admin',
        ]);
    }
    public function guru()
    {
        $nip = Auth::user()->nisn_or_nip;
        $guru = User::where('nisn_or_nip',$nip)->with('data_guru')->first();

        return view('data-profile.profile.profile-guru',[
            'title' => 'Data Profile Guru',
            'guru'  => $guru,
        ]);
    }
    public function siswa()
    {
        $nisn = Auth::user()->nisn_or_nip;
        $siswa = User::where('nisn_or_nip',$nisn)->with('data_siswa')->first();
        return view('data-profile.profile.profile-siswa',[
            'title' => 'Data Profile Siswa',
            'siswa' => $siswa
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
