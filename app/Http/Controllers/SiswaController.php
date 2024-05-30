<?php

namespace App\Http\Controllers;

use App\Models\ProfileSiswa;
use App\Models\User;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function data_siswa()
    {
        $data = User::where('role', 'siswa')->with('data_siswa')->get();
    
        return view('siswa.siswa_index', [
            'title' => 'Data Siswa',
            'data'  => $data,
        ]);
    }

    public function edit(string $id)
    {
        $siswa = User::findOrFail($id);
        return view('siswa.siswa_edit',[
            'siswa' => $siswa,
            'title' => 'Edit Data Siswa'
        ]);
    }

    public function update(Request $request,$id)
    {
        // $this->validate($request,[
        //     'nama_jurusan' => 'required',
        // ]);

        $data = [
            'nisn_or_nip' => $request->nisn,
            'name' => $request->name,
            'email' => $request->email,
        ];

        $data2 = [
            'kelas'     => $request->kelas,
            'jurusan'   => $request->jurusan,
            'absen'     => $request->absen,
        ];

        
        User::where('id',$id)->update($data);
        ProfileSiswa::where('id',$id)->update($data2);

        return redirect()->route('users.siswa')->with('success', 'Data Siswa '.$data['name'].' berhasil diubah');;
    }

    public function destroy(string $id)
    {
        $user = ProfileSiswa::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Data Siswa '.$user->name.' berhasil dihapus');
    }

    
}
