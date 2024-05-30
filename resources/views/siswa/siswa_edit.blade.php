@extends('layouts.app')
@section('content')
    <div class="container-fluid mt-3 dashboard-content">
        <div class="card border-0">
            <div class="card-body">
                <h5 class="card-title fw-bold mb-3">
                    Edit User
                </h5>
                <form action="{{ route('siswa.update',['id' =>$siswa->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <label for="" class="fw-medium mb-2 mt-2">NISN</label>
                                <input type="text" name="nisn" class="form-control mb-3" placeholder="NISN"
                                    value="{{ $siswa->nisn_or_nip }}">
                                <label for="" class="fw-medium mb-2 mt-2">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control mb-3" placeholder="Nama Lengkap"
                                    value="{{ $siswa->name }}">
                                <label for="" class="fw-medium mb-2 mt-2">Jenis Kelamin</label>
                                <input type="text" name="jk" class="form-control mb-3" placeholder="Jenis Kelamin"
                                    value="{{ $siswa->data_siswa->jk }}">
                                <label for="" class="fw-medium mb-2 mt-2">Kelas</label>
                                <input type="text" name="kelas" class="form-control mb-3" placeholder="Kelas"
                                    value="{{ $siswa->data_siswa->kelas }}">
                                <label for="" class="fw-medium mb-2 mt-2">No Absen</label>
                                <input type="text" name="absen" class="form-control mb-3" placeholder="No Absen"
                                    value="{{ $siswa->data_siswa->absen }}">
                                <label for="" class="fw-medium mb-2 mt-2">Jurusan</label>
                                <input type="text" name="jurusan" class="form-control mb-3" placeholder="Jurusan"
                                    value="{{ $siswa->data_siswa->jurusan }}">  
                                <label for="" class="fw-medium mb-2 mt-2">Email</label>
                                <input type="email" name="email" class="form-control mb-3" placeholder="Email"
                                    value="{{ $siswa->email }}">
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
