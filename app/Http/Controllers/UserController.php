<?php

namespace App\Http\Controllers;

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
        return view('users.users_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'role' => 'required',
            'nisn_or_nip' => 'required|unique:users,nisn_or_nip',
            'name' => 'required|min:1',
            'email' => 'required|min:1',
            'password' => 'required|min:6',
        ],[
            'role.required' => 'Role wajib diisi',
            'nisn_or_nip.required' => 'NISN OR NIP wajib diisi',
            'nisn_or_nip.unique' => 'NISN OR NIP sudah ada',
            'name.required' => 'Nama wajib diisi',
            'name.min' => 'Nama minimal berisi :min character',
            'email.required' => 'Email wajib diisi',
            'email.min' => 'Email minimal berisi :min',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal berisi :min character',
        ]);

        $data = [
            'role' => $request->role,
            'nisn_or_nip' => $request->nisn_or_nip,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ];

        if($users = User::create($data)){
            if($data['role'] === 'admin'){
                $users->assignRole('admin');
            }elseif($data['role'] === 'guru'){
                $users->assignRole('admin');
            }elseif($data['role'] === 'siswa'){
                $users->assignRole('siswa');
            }
            return redirect()->route('users.index')->with('success', 'Data Users berhasil dibuat!');
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
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
