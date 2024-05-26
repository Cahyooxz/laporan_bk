@extends('layouts.app')
@section('content')
    <div class="container-fluid mt-3 dashboard-content">
        <div class="card border-0">
            <div class="card-body">
                <h5 class="card-title fw-bold mb-3">
                    Tambah User
                </h5>
                <form action="{{ route('users.update',['id' => $user->id]) }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <label for="" class="fw-medium mb-2">Role User</label>
                                <select name="role" id="" class="form-select mb-3">
                                    <option disabled selected>Pilih Role</option>
                                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : ''}}>Admin</option>
                                    <option value="guru" {{ $user->role === 'guru' ? 'selected' : ''}}>Guru</option>
                                    <option value="siswa" {{ $user->role === 'siswa' ? 'selected' : ''}}>Siswa</option>
                                </select>
                                @error('role')
                                    <small class="text-danger mb-3 d-block">{{ $message }}</small>
                                @enderror
                                @if($user->role === 'admin')
                                <label for="" class="fw-medium mb-2 mt-2">ID_Admin</label>
                                <input type="text" name="nisn_or_nip" class="form-control mb-3" placeholder="ID Admin"
                                    value="{{ $user->nisn_or_nip }}">
                                @error('nisn_or_nip')
                                    <small class="text-danger mb-3 d-block">{{ $message }}</small>
                                @enderror
                                @elseif($user->role === 'guru')
                                    <label for="" class="fw-medium mb-2 mt-2">NIP</label>
                                    <input type="text" name="nisn_or_nip" class="form-control mb-3" placeholder="NIP (Nomor Identitas Pegawai)"
                                        value="{{ $user->nisn_or_nip }}">
                                    @error('nisn_or_nip')
                                        <small class="text-danger mb-3 d-block">{{ $message }}</small>
                                    @enderror
                                @elseif($user->role === 'siswa')
                                    <label for="" class="fw-medium mb-2 mt-2">NISN</label>
                                    <input type="text" name="nisn_or_nip" class="form-control mb-3" placeholder="NIP (Nomor Induk Siswa Nasional)"
                                        value="{{ $user->nisn_or_nip }}">
                                    @error('nisn_or_nip')
                                        <small class="text-danger mb-3 d-block">{{ $message }}</small>
                                    @enderror
                                @endif
                                <label for="" class="fw-medium mb-2 mt-2">Name</label>
                                <input type="text" name="name" class="form-control mb-3" placeholder="Nama Lengkap"
                                    value="{{ $user->name }}">
                                @error('name')
                                    <small class="text-danger mb-3 d-block">{{ $message }}</small>
                                @enderror
                                
                                <label for="" class="fw-medium mb-2 mt-2">Email</label>
                                <input type="email" name="email" class="form-control mb-3" placeholder="Email"
                                    value="{{ $user->email }}">
                                @error('email')
                                    <small class="text-danger mb-3 d-block">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-12 mt-5">
                                <a href="{{ route('users.index') }}" class="btn btn-secondary me-3">Close</a>
                                <button type="submit" class="button py-2 px-3 rounded text-decoration-none text-center ">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
