@extends('layouts.app')
@section('content')
    <div class="container-fluid mt-3 dashboard-content" data-aos="fade-up">
        <div class="card border-0">
            <div class="card-body">
                <h5 class="card-title fw-bold mb-5">
                    Buat Surat Peringatan
                </h5>
                <form action="{{ route('sp.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <label for="" class="fw-medium mb-2">Surat Peringatan</label>
                                <select name="surat_peringatan" id="surat_peringatan" class="form-select mb-3">
                                    <option disabled selected>Pilih Surat Peringatan</option>
                                    <option value="SP1">SP 1</option>
                                    <option value="SP2">SP 2</option>
                                    <option value="SP3">SP 3</option>
                                </select>
                                @error('surat_peringatan')
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

                                <label for="" class="fw-medium mb-2 mt-2">Pelanggaran</label>
                                <input type="text" name="pelanggaran" class="form-control mb-3" placeholder="Nama Kompetisi"
                                    value="{{ old('pelanggaran') }}">
                                @error('pelanggaran')
                                    <small class="text-danger mb-3 d-block">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-12 mt-3">
                                <a href="{{ route('sp.index') }}" class="btn btn-secondary me-3">Close</a>
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
