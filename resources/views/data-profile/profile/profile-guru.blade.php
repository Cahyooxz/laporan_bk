@extends('data-profile.temp-profile')
@section('profile-guru')
  <div class="container">
    <div class="row">
      <div class="col-12 mt-4">
          <div class="d-flex mb-3">
              <h4>Data Diri</h4>
          </div>
          <div class="container-fluid" data-aos="fade-up">
              <div class="row">
                  <div class="col-12 col-sm-5 col-md-4 col-xl-3">
                      <div class="card mt-3 border shadow">
                          <div class="card-body d-flex justify-content-center align-items-center flex-column gap-2">
                                  <div class="position-relative d-flex justify-content-center">
                                      <img src="{{ asset('img/sma_profile1.png') }}" alt="profile"
                                          class="profile-foto">
                                      <div class="d-flex justify-content-end position-absolute" style="left: 65%;bottom:5%;">
                                      </div>
                                  </div>
                              <p class="fw-bold m-0 mb-2 text-center mt-5">{{$guru->name}}</p>
                              <p class="text-center">{{$guru->email}}</p>
                          </div>
                      </div>
                  </div>
                  <div class="col-12 col-sm-7 col-md-8 col-xl-9">
                      <div class="card mt-3 border shadow">
                          <div class="card-body">
                              <h4 class="mb-3">Data Diri</h4>
                              <h4 class="mb-3 border-bottom"></h4>
                              <div class="data-profile row px-2 px-md-5 py-3">
                                  <div class="col-12 col-md-6">
                                      {{-- NISN --}}
                                      <div class="form-group mb-4">
                                          <label for="nama" class="fw-semibold"><i
                                                  class="fa-solid fa-id-card me-2"></i>NIP</label>
                                          <p class=" mb-3 mt-2 p-2 w-100">{{$guru->data_guru->nip}}</p>
                                      </div>
                                      {{-- Nama --}}
                                      <div class="form-group mb-4">
                                          <label for="nama" class="fw-semibold"><i
                                                  class="fa-solid fa-user-tag me-2"></i>Nama Lengkap</label>
                                          <p class=" mb-3 mt-2 p-2 w-100">{{$guru->name}}</p>
                                      </div>
                                      {{-- Email --}}
                                      <div class="form-group mb-4">
                                          <label for="nama" class="fw-semibold"><i
                                                  class="fa-solid fa-envelope me-2"></i>Email</label>
                                          <p class=" mb-3 mt-2 p-2 w-100">{{$guru->email}}</p>
                                      </div>
                                  </div>
                                  <div class="col-12 col-md-6">
                                      {{-- Kelas --}}
                                      <div class="form-group mb-4">
                                          <label for="nama" class="fw-semibold"><i
                                                  class="fa-solid fa-school me-2"></i>Kelas</label>
                                          <p class=" mb-3 mt-2 p-2 w-100">XI</p>
                                      </div>
                                      {{-- jk --}}
                                      <div class="form-group mb-4">
                                        <label for="nama" class="fw-semibold"><i
                                                class="fa-solid fa-venus-mars me-2"></i>Jenis Kelamin</label>
                                        <p class=" mb-3 mt-2 p-2 w-100">{{$guru->data_guru->jk}}</p>
                                    </div>
                                      <div class="form-group mb-4">
                                          <label for="urutan_kelas" class="fw-semibold"><i
                                                  class="fa-solid fa-list-ol me-2"></i>Bagian</label>
                                          <p class=" mb-3 mt-2 p-2 w-100">{{$guru->data_guru->bagian}}</p>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>
@endsection