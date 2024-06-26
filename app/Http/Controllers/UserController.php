<?php

namespace App\Http\Controllers;

use App\Models\ProfileGuru;
use App\Models\ProfileSiswa;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return view('users.users_index',[
            'data' => $data,
            'title' => 'Data Users'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.users_create',[
            'title' => 'Tambah Data Users'

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $this->validate($request, [
        'role' => 'required',
        'nisn_or_nip' => 'required|unique:users,nisn_or_nip',
        'name' => 'required|min:1',
        'email' => 'required|min:1|unique:users,email',
        'password' => 'required|min:6',
    ], [
        'role.required' => 'Role wajib diisi',
        'nisn_or_nip.required' => 'NISN OR NIP wajib diisi',
        'nisn_or_nip.unique' => 'NISN OR NIP sudah ada',
        'name.required' => 'Nama wajib diisi',
        'name.min' => 'Nama minimal berisi :min karakter',
        'email.required' => 'Email wajib diisi',
        'email.min' => 'Email minimal berisi :min',
        'email.unique' => 'Email sudah ada',
        'password.required' => 'Password wajib diisi',
        'password.min' => 'Password minimal berisi :min karakter',
    ]);

    $data = [
        'role' => $request->role,
        'nisn_or_nip' => $request->nisn_or_nip,
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ];

    if ($user = User::create($data)) {
        if ($data['role'] === 'admin') {
            $user->assignRole('admin');
        } elseif ($data['role'] === 'guru') {
            $user->assignRole('guru');
            ProfileGuru::create(['nisn_or_nip' => $request->nisn_or_nip]);
        } elseif ($data['role'] === 'siswa') {
            $user->assignRole('siswa');
            ProfileSiswa::create(['nisn' => $request->nisn_or_nip]);
        }

        return redirect()->route('users.index')->with('success', 'Data Users '.$data['name'].' berhasil dibuat');
    }
}


    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::findOrFail($id);
        return view('users.users_edit',[
            'user' => $users,
            'title' => 'Edit Data Users'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $this->validate($request,[
            'role' => 'required',
            'nisn_or_nip' => 'required|unique:users,nisn_or_nip,'.$user->id,
            'name' => 'required|min:1',
            'email' => 'required|min:1|unique:users,email,'.$user->id,
        ],[
            'role.required' => 'Role wajib diisi',
            'nisn_or_nip.required' => 'NISN OR NIP wajib diisi',
            'nisn_or_nip.unique' => 'NISN OR NIP sudah ada',
            'name.required' => 'Nama wajib diisi',
            'name.min' => 'Nama minimal berisi :min character',
            'email.required' => 'Email wajib diisi',
            'email.min' => 'Email minimal berisi :min',
            'email.unique' => 'Email sudah ada',
        ]);

        $user->update([
            'role' => $request->role,
            'nisn_or_nip' => $request->nisn_or_nip,
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if($user->update()){
            if($user->role === 'admin'){
                $user->syncRoles('admin');
            }elseif($user->role === 'guru'){
                $user->syncRoles('guru');
            }elseif($user->role === 'siswa'){
                $user->syncRoles('siswa');
            }
            return redirect()->route('users.index')->with('success','Data Users '.$user->name.' berhasil diedit!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Data Users '.$user->name.' berhasil dihapus');
    }
}
