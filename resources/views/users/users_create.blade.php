@extends('layouts.app')
@section('content')
    <div class="container-fluid mt-3 dashboard-content">
        <div class="card border-0">
            <div class="card-body">
                <h5 class="card-title fw-bold mb-3">
                    Tambah User
                </h5>
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <label for="" class="fw-medium mb-2">Role User</label>
                                <select name="role" id="role" class="form-select mb-3">
                                    <option disabled selected>Pilih Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="guru">Guru</option>
                                    <option value="siswa">Siswa</option>
                                </select>
                                @error('role')
                                    <small class="text-danger mb-3 d-block">{{ $message }}</small>
                                @enderror

                                <label for="" id="label-id" class="fw-medium mb-2 mt-2">ID</label>
                                <input type="text" name="nisn_or_nip" id="nisn_or_nip" class="form-control mb-3" placeholder="ID"
                                    value="{{ old('nisn_or_nip') }}">
                                @error('nisn_or_nip')
                                    <small class="text-danger mb-3 d-block">{{ $message }}</small>
                                @enderror
                                
                                <label for="" class="fw-medium mb-2 mt-2">Name</label>
                                <input type="text" name="name" class="form-control mb-3" placeholder="Nama Lengkap"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <small class="text-danger mb-3 d-block">{{ $message }}</small>
                                @enderror
                                
                                <label for="" class="fw-medium mb-2 mt-2">Email</label>
                                <input type="email" name="email" class="form-control mb-3" placeholder="Email"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <small class="text-danger mb-3 d-block">{{ $message }}</small>
                                @enderror
                                <label for="" class="fw-medium mb-2 mt-2">Password</label>
                                <input type="password" name="password" class="form-control mb-3" placeholder="Password">
                                @error('password')
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const roleSelect = document.getElementById('role');
            const labelID = document.getElementById('label-id');
            const nisnOrNipInput = document.getElementById('nisn_or_nip');

            roleSelect.addEventListener('change', function() {
                switch (this.value) {
                    case 'admin':
                        labelID.innerText = 'ID Admin';
                        nisnOrNipInput.placeholder = 'ID Admin';
                        break;
                    case 'guru':
                        labelID.innerText = 'NIP';
                        nisnOrNipInput.placeholder = 'NIP (Nomor Induk Pegawai)';
                        break;
                    case 'siswa':
                        labelID.innerText = 'NISN';
                        nisnOrNipInput.placeholder = 'NISN (Nomor Induk Siswa Nasional)';
                        break;
                    default:
                        labelID.innerText = 'ID';
                        nisnOrNipInput.placeholder = 'ID Admin';
                        break;
                }
            });
        });
    </script>
@endsection
