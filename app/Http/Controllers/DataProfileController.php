<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('data-profile.profile.profile-guru',[
            'title' => 'Data Profile Guru',
        ]);
    }
    public function siswa()
    {
        return view('data-profile.profile.profile-siswa',[
            'title' => 'Data Profile Siswa',
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