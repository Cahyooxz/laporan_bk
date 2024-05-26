<?php

namespace App\Http\Controllers;

use App\Models\SuratPeringatan;
use App\Models\User;
use Illuminate\Http\Request;

class SuratPeringatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function surat()
    {
        $user_login = auth()->user()->id;
        $sp = SuratPeringatan::where('user_id',$user_login)->get();
        return view('sp.sp',[
            'title' => 'Surat Peringatanmu',
            'sp' => $sp
        ]);
    }
    public function index()
    {
        $surat_peringatan = SuratPeringatan::join('users','users.id','=','surat_peringatan.user_id')
        ->select('surat_peringatan.id','surat_peringatan.user_id','users.name','surat_peringatan.surat_peringatan','surat_peringatan.pelanggaran')->get();
        return view('sp.sp_index',[
            'title' => 'Surat Peringatan',
            'sp' => $surat_peringatan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = User::where('role','siswa')->get();
        return view('sp.sp_create',[
            'siswa' => $siswa,
            'title' => 'Buat Surat Peringatan'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'user_id' => 'required|exists:users,id',
            'surat_peringatan' => 'required',
            'pelanggaran' => 'required'
        ]);

        // Ambil data dari request
        $userId = $request->user_id;
        $pelanggaran = $request->pelanggaran;

        // Periksa surat peringatan terakhir yang dimiliki user
        $lastWarning = SuratPeringatan::where('user_id', $userId)
        ->orderBy('created_at', 'desc')
        ->first();

        // Tentukan surat peringatan baru berdasarkan surat peringatan terakhir
        $newWarningLevel = 'SP1'; // Default surat peringatan pertama
        if ($lastWarning) {
            switch ($lastWarning->surat_peringatan) {
            case 'SP1':
                $newWarningLevel = 'SP2';
            break;
            case 'SP2':
                $newWarningLevel = 'SP3';
            break;
            case 'SP3':
                return redirect()->route('sp.index')->with('fail', 'User sudah memiliki Surat Peringatan SP3');
            }
        }

        $data = [
            'user_id' => $userId,
            'surat_peringatan' => $newWarningLevel,
            'pelanggaran' => $pelanggaran,
        ];

        $siswa = User::where('id',$userId)->first();
        if(SuratPeringatan::create($data)){
            return redirect()->route('sp.index')->with('success','Surat Peringatan ' . $newWarningLevel . ' kepada ' . $siswa->name . ' berhasil dibuat');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $surat_peringatan = SuratPeringatan::join('users','users.id','=','surat_peringatan.user_id')
        ->select('surat_peringatan.id','surat_peringatan.user_id','users.name','surat_peringatan.surat_peringatan','surat_peringatan.pelanggaran')->get();
        $siswa = User::where('role','siswa')->get();

        $sp = SuratPeringatan::findOrFail($id);
        return view('sp.sp_edit',[
            'sp' => $sp,
            'siswa' => $siswa,
            'title' => 'Edit Surat Peringatan'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input dari request
        $this->validate($request,[
            'user_id' => 'required|exists:users,id',
            'surat_peringatan' => 'required',
            'pelanggaran' => 'required'
        ]);
    
        // Ambil data dari request
        $userId = $request->user_id;
        $pelanggaran = $request->pelanggaran;
        $suratPeringatan = $request->surat_peringatan;
    
        // Cek apakah surat peringatan yang diinginkan sudah ada untuk user ini
        $existingWarning = SuratPeringatan::where('user_id', $userId)
                                          ->where('surat_peringatan', $suratPeringatan)
                                          ->first();
    
        if ($existingWarning && $existingWarning->id != $id) {
            return redirect()->route('sp.index')->with('fail', 'User sudah memiliki Surat Peringatan ' . $suratPeringatan);
        }
    
        // Siapkan data untuk update
        $data = [
            'user_id' => $userId,
            'surat_peringatan' => $suratPeringatan,
            'pelanggaran' => $pelanggaran,
        ];
    
        // Cari Surat Peringatan yang akan diupdate
        $peringatan = SuratPeringatan::findOrFail($id);
        $siswa = User::where('id', $userId)->first();
    
        // Update data Surat Peringatan
        if ($peringatan->update($data)) {
            return redirect()->route('sp.index')->with('success', 'Surat Peringatan ' . $suratPeringatan . ' kepada ' . $siswa->name . ' berhasil diedit');
        }
    
        // Jika terjadi kesalahan saat mengupdate
        return redirect()->route('sp.index')->with('fail', 'Terjadi kesalahan saat mengupdate Surat Peringatan.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sp = SuratPeringatan::findOrFail($id);
        $siswa = User::where('id',$sp->user_id)->first();

        $sp->delete();
        return redirect()->route('sp.index')->with('success','Surat Peringatan ' . $sp->surat_peringatan . ' kepada ' . $siswa->name . ' berhasil dihapus');
    }
}
