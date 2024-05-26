<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;
use App\Models\User;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function prestasi()
    {
        $user_login = auth()->user()->id;

        $prestasi = Prestasi::where('user_id',$user_login)->orderBy('created_at','desc')->get();
        return view('prestasi.prestasi',
        [
            'prestasi' => $prestasi,
            'title' => 'Prestasi Siswa'
        ]);
    }
    public function index()
    {
        $prestasi = Prestasi::join('users','users.id','=','prestasi.user_id')
        ->select('prestasi.id','prestasi.user_id','users.name','prestasi.peringkat','prestasi.nama_kompetisi')->get();
        return view('prestasi.prestasi_index',
        [
            'prestasi' => $prestasi,
            'title' => 'Prestasi Siswa'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = User::where('role','siswa')->get();
        return view('prestasi.prestasi_create',[
            'siswa' => $siswa,
            'title' => 'Tambah Rimayat Prestasi Siswa',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'user_id' => 'required|exists:users,id',
            'peringkat' => 'required',
            'nama_kompetisi' => 'required|min:1',
        ],
        [
            'user_id.required' => 'Nama siswa wajib diisi',
            'user_id.exists' => 'Nama siswa tidak terdaftar',
            'peringkat.required' => 'Peringkat wajib diisi',
            'nama_kompetisi.required' => 'Nama Kompetisi wajib diisi',
            'nama_kompetisi.min' => 'Nama Kompetisi minimal berisi :min huruf',
        ]);

        $data = [
            'user_id' => $request->user_id,
            'peringkat' => $request->peringkat,
            'nama_kompetisi' => $request->nama_kompetisi,
        ];

        $siswa = User::where('id', $data['user_id'])->first();

        if(Prestasi::create($data)){
            return redirect()->route('prestasi.index')->with('success','Data Prestasi siswa '.$siswa->name.' berhasil ditambahkan');
        }
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
        $prestasi = Prestasi::join('users','users.id','=','prestasi.user_id')
        ->select('prestasi.id','prestasi.user_id','users.name','prestasi.peringkat','prestasi.nama_kompetisi')
        ->where('prestasi.id',$id)->first();

        $siswa = User::where('role','siswa')->get();

        return view('prestasi.prestasi_edit',[
            'prestasi' => $prestasi,
            'siswa' => $siswa,
            'title' => 'Edit Prestasi Siswa',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $prestasi = Prestasi::findOrFail($id);
        $siswa = User::where('id',$prestasi->user_id)->first();

        $this->validate($request,[
            'user_id' => 'required|exists:users,id',
            'peringkat' => 'required',
            'nama_kompetisi' => 'required|min:1',
        ],
        [
            'user_id.required' => 'Nama siswa wajib diisi',
            'user_id.exists' => 'Nama siswa tidak terdaftar',
            'nama_kompetisi.required' => 'Nama Kompetisi wajib diisi',
            'nama_kompetisi.min' => 'Nama Kompetisi minimal berisi :min huruf',
        ]);

        $data = [
            'user_id' => $request->user_id,
            'peringkat' => $request->peringkat,
            'nama_kompetisi' => $request->nama_kompetisi,
        ];

        if($prestasi->update($data)){
            return redirect()->route('prestasi.index')->with('success','Data Prestasi siswa '.$siswa->name.' berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prestasi = Prestasi::findOrFail($id);
        $siswa = User::where('id',$prestasi->user_id)->first();

        $prestasi->delete();
        return redirect()->route('prestasi.index')->with('success','Data Prestasi siswa '.$siswa->name.' berhasil dihapus');
    }
}
