@extends('layouts.app')
@section('content')
  {{-- @if(!$jata->isEmpty()) --}}
    <div class="container-fluid mt-5" data-aos="fade-up">
      <div class="row">
        <div class="col-12">
          <h4 class="mb-3">Data Jurusan</h4>
          <div class="card">
            <div class="card-body">
              <div class="d-flex mb-3">
                <a href="{{ route('jurusan.create') }}" class="btn btn-success ms-auto"><i class="fa-solid fa-circle-plus me-3"></i>Tambah Jurusan</a>
              </div>
              <table class="table" id="table-users">
                <thead>
                  <th>Nama Jurusan</th>
                  <th>Aksi</th>
                </thead>
                <tbody>
                  @foreach ($jurusan as $j)
                  <tr>
                    <td>{{ $j->nama_jurusan }}</td>
                    <td>
                      <div class="dropdown">
                          <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                              aria-expanded="false">
                              <i class="bi bi-gear me-3"></i>Option
                          </button>
                          <ul class="dropdown-menu">
                              <li><a class="dropdown-item"
                                      href="{{ route('jurusan.edit', ['id' => $j->id]) }}"><i
                                          class="bi bi-pen me-2"></i>Edit</a></li>
                              <li>
                                  <form id="hapus-jurusan-{{ $j->id }}" action="{{ route('jurusan.destroy', ['id' => $j->id]) }}" method="POST" class="form-delete">
                                      @csrf
                                      @method('DELETE')
                                      <button type="button" class="dropdown-item text-danger btn-delete" id="btnHapusJurusan{{ $j->id }}"><i class="bi bi-trash3 me-2"></i>Delete</button>
                                  </form>
                                    <script>
                                      document.addEventListener('DOMContentLoaded', function() {
                                          document.getElementById('btnHapusJurusan{{ $j->id }}').addEventListener('click', function() {
                                              Swal.fire({
                                                  title: 'Apakah Anda yakin menghapus data {{ $j->nama_jurusan}} ?',
                                                  text: "Data yang dihapus tidak dapat dikembalikan!",
                                                  icon: 'warning',
                                                  showCancelButton: true,
                                                  confirmButtonColor: '#d33',
                                                  cancelButtonColor: '#3085d6',
                                                  confirmButtonText: 'Ya, hapus!',
                                                  cancelButtonText: 'Batal'
                                              }).then((result) => {
                                                  if (result.isConfirmed) {
                                                      document.getElementById('hapus-jurusan-{{ $j->id }}').submit();
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