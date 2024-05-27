<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function jurusan()
    {
        $jurusan = Jurusan::all();
        return view('jurusan.jurusan',
        [
            'jurusan' => $jurusan,
            'title' => 'Data Jurusan'
        ]);
    }

    public function create()
    {
        return view('jurusan.jurusan_create',[
            'title' => 'Tambah Data Jurusan'

        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_jurusan' => 'required',
        ]);

        $data = [
            'nama_jurusan' => $request->nama_jurusan,
        ];
        
        Jurusan::create($data);

        return redirect()->route('jurusan')->with('success', 'Data Jurusan '.$data['nama_jurusan'].' berhasil dibuat');;
    }

    public function edit($id)
    {
        $j = Jurusan::findOrFail($id); 
        return view('jurusan.jurusan_edit',[
            'title' => 'Edit Data Jurusan',
            'j'     =>  $j,

        ]);
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'nama_jurusan' => 'required',
        ]);

        $data = [
            'nama_jurusan' => $request->nama_jurusan,
        ];
        
        Jurusan::where('id',$id)->update($data);

        return redirect()->route('jurusan')->with('success', 'Data Jurusan '.$data['nama_jurusan'].' berhasil diubah');;
    }

    public function destroy($id)
    {
        $j = Jurusan::findOrFail($id);
        $j->delete();

        return redirect()->route('jurusan')->with('success', 'Data Jurusan '.$j->nama_jurusan.' berhasil dihapus');;
    }
    
}
