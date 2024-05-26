@extends('layouts.app')
@section('content')
  {{-- @if(!$data->isEmpty()) --}}
    <div class="container-fluid mt-5" data-aos="fade-up">
      <div class="row">
        <div class="col-12">
          <h4 class="mb-4">Data Prestasi</h4>
          <div class="card">
            <div class="card-body">
              <div class="d-flex mb-3">
                <a href="{{ route('prestasi.create') }}" class="btn btn-success ms-auto"><i class="fa-solid fa-circle-plus me-3"></i>Tambah Prestasi</a>
              </div>
              <table class="table" id="table-prestasi">
                <thead>
                  <th>Nama Siswa</th>
                  <th>Prestasi</th>
                  <th>Nama Kompetensi</th>
                  <th>Aksi</th>
                </thead>
                <tbody>
                  @foreach ($prestasi as $d)
                  <tr>
                    <td>{{ $d->name }}</td>
                    <td>{{ $d->peringkat }}</td>
                    <td>{{ $d->nama_kompetisi }}</td>
                    <td>
                      <div class="dropdown">
                          <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                              aria-expanded="false">
                              <i class="bi bi-gear me-3"></i>Option
                          </button>
                          <ul class="dropdown-menu">
                              <li><a class="dropdown-item"
                                      href="{{ route('prestasi.edit', ['id' => $d->id]) }}"><i
                                          class="bi bi-pen me-2"></i>Edit</a></li>
                              <li>
                                  <form id="hapus-prestasi-{{ $d->id }}" action="{{ route('prestasi.destroy', ['id' => $d->id]) }}" method="POST" class="form-delete">
                                      @csrf
                                      @method('DELETE')
                                      <button type="button" class="dropdown-item text-danger btn-delete" id="btnHapusPrestasi{{ $d->id }}"><i class="bi bi-trash3 me-2"></i>Delete</button>
                                  </form>
                                    <script>
                                      document.addEventListener('DOMContentLoaded', function() {
                                          document.getElementById('btnHapusPrestasi{{ $d->id }}').addEventListener('click', function() {
                                              Swal.fire({
                                                  title: 'Apakah Anda yakin menghapus data {{ $d->name}} ?',
                                                  text: "Data yang dihapus tidak dapat dikembalikan!",
                                                  icon: 'warning',
                                                  showCancelButton: true,
                                                  confirmButtonColor: '#d33',
                                                  cancelButtonColor: '#3085d6',
                                                  confirmButtonText: 'Ya, hapus!',
                                                  cancelButtonText: 'Batal'
                                              }).then((result) => {
                                                  if (result.isConfirmed) {
                                                      document.getElementById('hapus-prestasi-{{ $d->id }}').submit();
                                                  }
                                              });
                                          });
                                      });
                                    </script>
                              </li>
                          </ul>
                      </div>
                    </td>
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