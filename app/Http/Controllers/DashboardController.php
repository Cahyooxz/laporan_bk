<?php

namespace App\Http\Controllers;

use App\Models\SuratPeringatan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sp1 = SuratPeringatan::where('surat_peringatan','SP1')->count();
        $sp2 = SuratPeringatan::where('surat_peringatan','SP2')->count();
        $sp3 = SuratPeringatan::where('surat_peringatan','SP3')->count();
        return view('dashboard',[
            'sp1' => $sp1,
            'sp2' => $sp2,
            'sp3' => $sp3,
            'title' => 'Dashboard',
        ]
    );
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
