@extends('layouts.app')
@section('content')
  @if(!$sp->isEmpty())
    <div class="container-fluid mt-5 d-flex align-items-center justify-content-center" data-aos="fade-up" style="min-height: 90vh">
      <div class="row">
        <div class="col-12 col-md-6 d-flex justify-content-center align-content-center">
          <img src="{{ asset('img/sp_danger.png') }}" class="mt-5 notfound">
        </div>
        <div class="col-12 col-md-6">
          <h4 class="text-primary-emphasis fw-bold mt-5 mb-5">Catatan Surat Peringatanmu</h4>
          @foreach ($sp as $d)
            
          @endforeach
          @if($d->surat_peringatan === 'SP1')
            <div class="card mb-3 alert alert-warning">
              <div class="card-body p-0">
                <div class="d-flex">
                  <h5 class="fw-bold">SP 1</h5>
                  <p class="ms-auto mt-5 fw-medium text-end p-0 m-0 juara">{{ $d->pelanggaran }}</p>
                </div>
              </div>
            </div>
          @elseif($d->surat_peringatan === 'SP2')
            <div class="card mb-3 alert alert-warning2">
              <div class="card-body p-0">
                <div class="d-flex">
                  <h5 class="fw-bold">SP 2</h5>
                  <p class="ms-auto mt-5 fw-medium text-end p-0 m-0 juara">{{ $d->pelanggaran }}</p>
                </div>
              </div>
            </div>
          @elseif($d->surat_peringatan === 'SP3')
            <div class="card mb-3 alert alert-danger">
              <div class="card-body p-0">
                <div class="d-flex">
                  <h5 class="fw-bold">SP 3</h5>
                  <p class="ms-auto mt-5 fw-medium text-end p-0 m-0 juara">{{ $d->pelanggaran }}</p>
                </div>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
  @else
    <div class="container-fluid mt-5 d-flex justify-content-center align-items-center" style="min-height: 90vh" data-aos="fade-up">
      <div class="row">
        <div class="col-12 d-flex justify-content-center align-items-center flex-column gap-5">
          <img src="{{ asset('img/sp_aman.png') }}" class="mt-5 notfound">
          <p class="fw-bold mt-5">Anda tidak memiliki catatan Surat Peringatan,tetap pertahankan ya!</p>
        </div>
      </div>
    </div>
  @endif
@endsection
