@extends('layouts.app')
@section('content')
    <div class="container-fluid mt-3 dashboard-content" data-aos="fade-up">
        <div class="card border-0">
            <div class="card-body">
                <h5 class="card-title fw-bold mb-5">
                    Edit Surat Peringatan
                </h5>
                <form action="{{ route('sp.update',['id' => $sp->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <label for="" class="fw-medium mb-2">Surat Peringatan</label>
                                <select name="surat_peringatan" id="surat_peringatan" class="form-select mb-3">
                                    <option disabled selected>Pilih Surat Peringatan</option>
                                    <option value="SP1" {{ $sp->surat_peringatan === 'SP1' ? 'selected' :'' }}>SP 1</option>
                                    <option value="SP2" {{ $sp->surat_peringatan === 'SP2' ? 'selected' :'' }}>SP 2</option>
                                    <option value="SP3" {{ $sp->surat_peringatan === 'SP3' ? 'selected' :'' }}>SP 3</option>
                                </select>
                                @error('surat_peringatan')
                                    <small class="text-danger mb-3 d-block">{{ $message }}</small>
                                @enderror
                                <label for="" class="fw-medium mb-2">Nama Siswa</label>
                                <select name="user_id" id="user_id" class="form-select mb-3">
                                    <option disabled>Pilih Siswa</option>
                                    @foreach ($siswa as $d)
                                    <option value="{{ $d->id }}" {{ $sp->user_id === $d->id ? 'selected' : ''}}>{{ $d->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <small class="text-danger mb-3 d-block">{{ $message }}</small>
                                @enderror

                                <label for="pelanggaran" class="fw-medium mb-2 mt-2">Pelanggaran</label>
                                <input type="text" name="pelanggaran" class="form-control mb-3" placeholder="Pelanggaran"
                                    value="{{ $sp->pelanggaran }}">
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
@endsection
