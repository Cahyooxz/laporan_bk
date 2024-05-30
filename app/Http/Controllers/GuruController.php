<?php

namespace App\Http\Controllers;

use App\Models\ProfileGuru;
use App\Models\User;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function data_guru()
    {
        $data = User::where('role', 'guru')->with('data_guru')->get();

        return view('guru.guru_index',[
            'title'     => 'Data Guru',
            'data'      => $data,

        ]);
    }

    public function edit(string $id)
    {
        $guru = User::findOrFail($id);
        return view('guru.guru_edit',[
            'guru' => $guru,
            'title' => 'Edit Data guru'
        ]);
    }

    public function update(Request $request,$id)
    {
        // $this->validate($request,[
        //     'nama_jurusan' => 'required',
        // ]);

        $data = [
            'nisn_or_nip' => $request->nip,
            'name' => $request->name,
            'email' => $request->email,
        ];

        $data2 = [
            'kelas'     => $request->kelas,
            'bagian'   => $request->bagian,
        ];

        
        User::where('id',$id)->update($data);
        ProfileGuru::where('id',$id)->update($data2);

        return redirect()->route('users.guru')->with('success', 'Data Guru '.$data['name'].' berhasil diubah');;
    }

    public function destroy(string $id)
    {
        $user = ProfileGuru::findOrFail($id);
        $user->delete();

        return redirect()->route('users.guru')->with('success', 'Data Guru '.$user->name.' berhasil dihapus');
    }
}
