@extends('layouts.app')
@section('content')
    <div class="container-fluid mt-3 dashboard-content" data-aos="fade-up">
        <div class="card border-0">
            <div class="card-body">
                <h5 class="card-title fw-bold mb-5">
                    Tambah Prestasi
                </h5>
                <form action="{{ route('prestasi.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <label for="" class="fw-medium mb-2">Peringkat Kejuaraan</label>
                                <select name="peringkat" id="peringkat" class="form-select mb-3">
                                    <option disabled selected>Pilih Peringkat</option>
                                    <option value="Juara 1">Juara 1</option>
                                    <option value="Juara 2">Juara 2</option>
                                    <option value="Juara 3">Juara 3</option>
                                </select>
                                @error('peringkat')
                                    <small class="text-danger mb-3 d-block">{{ $message }}</small>
                                @enderror
                                <label for="" class="fw-medium mb-2">Nama Siswa</label>
                                <select name="user_id" id="user_id" class="form-select mb-3">
                                    <option disabled selected>Pilih Siswa</option>
                                    @foreach ($siswa as $d)
                                    <option value="{{ $d->id }}">{{ $d->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <small class="text-danger mb-3 d-block">{{ $message }}</small>
                                @enderror

                                <label for="" class="fw-medium mb-2 mt-2">Nama Kompetisi</label>
                                <input type="text" name="nama_kompetisi" class="form-control mb-3" placeholder="Nama Kompetisi"
                                    value="{{ old('nama_kompetisi') }}">
                                @error('nama_kompetisi')
                                    <small class="text-danger mb-3 d-block">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-12 mt-3">
                                <a href="{{ route('prestasi.index') }}" class="btn btn-secondary me-3">Close</a>
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
