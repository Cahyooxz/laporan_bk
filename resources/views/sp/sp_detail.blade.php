@extends('layouts.app')
@section('content')
  {{-- @if(!$data->isEmpty()) --}}
    <div class="container-fluid mt-5" data-aos="fade-up">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="d-flex mb-3">
                <a href="{{ route('sp.create') }}" class="btn btn-success ms-auto"><i class="fa-solid fa-circle-plus me-3"></i>Buat Surat Peringatan</a>
              </div>
              <table class="table" id="table-sp">
                <thead>
                  <th>Nama Siswa</th>
                  <th>Surat Peringatan</th>
                  <th>Pelanggaran</th>
                </thead>
                <tbody>
                  @foreach ($sp as $d)
                  <tr>
                    <td>{{ $d->name }}</td>
                    <td>{{ $d->surat_peringatan }}</td>
                    <td>{{ $d->pelanggaran }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection