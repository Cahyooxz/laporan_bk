@extends('layouts.app')
@section('content')
  @if(!$prestasi->isEmpty())
    <div class="container-fluid" data-aos="fade-up">
      <div class="row" style="min-height: 90vh">
        <div class="col-12 col-md-6 d-flex justify-content-center align-content-center">
          <img src="{{ asset('img/prestasi.png') }}" class="mt-5">
        </div>
        <div class="col-12 col-md-6 mt-5">
          <h4 class="text-primary-emphasis fw-bold mt-5 mb-5">Prestasimu.</h4>
          @foreach ($prestasi as $d)
            @if($d->peringkat === 'Juara 1')
              <div class="card mb-3">
                <div class="card-body">
                  <div class="d-flex">
                    <img src="{{ asset('img/gold.png') }}" alt="" style="width:20px;height:25px" class="me-3">
                    <h5 class="fw-bold text-primary-emphasis">Juara 1</h5>
                    <p class="ms-auto mt-3 fw-medium text-primary-emphasis text-end p-0 m-0 juara">{{ $d->nama_kompetisi }}</p>
                  </div>
                </div>
              </div>
            @elseif($d->peringkat === 'Juara 2')
              <div class="card mb-3">
                <div class="card-body">
                  <div class="d-flex">
                    <img src="{{ asset('img/silver.png') }}" alt="" style="width:20px;height:25px" class="me-3">
                    <h5 class="fw-bold text-primary-emphasis">Juara 2</h5>
                    <p class="ms-auto mt-3 fw-medium text-primary-emphasis text-end p-0 m-0 juara">{{ $d->nama_kompetisi }}</p>
                  </div>
                </div>
              </div>
            @elseif($d->peringkat === 'Juara 3')
              <div class="card mb-3">
                <div class="card-body">
                  <div class="d-flex">
                    <img src="{{ asset('img/bronze.png') }}" alt="" style="width:20px;height:25px" class="me-3">
                    <h5 class="fw-bold text-primary-emphasis">Juara 3</h5>
                    <p class="ms-auto mt-3 fw-medium text-primary-emphasis text-end p-0 m-0 juara">{{ $d->nama_kompetisi }}</p>
                  </div>
                </div>
              </div>
            @endif
          @endforeach
        </div>
      </div>
    </div>
  @else
    <div class="container-fluid mt-5 d-flex justify-content-center align-items-center" style="min-height: 90vh" data-aos="fade-up">
      <div class="row">
        <div class="col-12 d-flex justify-content-center align-items-center flex-column gap-5">
          <img src="{{ asset('img/prestasi.png') }}" class="mt-5 notfound">
          <p class="fw-bold mt-5">Anda belum tercatat memiliki prestasi, tingkatkan belajarmu ya!</p>
        </div>
      </div>
    </div>
  @endif
@endsection
