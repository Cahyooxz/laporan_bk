@extends('layouts.app')
@section('content')
  {{-- @if(!$data->isEmpty()) --}}
    <div class="container-fluid mt-5" data-aos="fade-up">
      <div class="row">
        <div class="col-12">
          <h4 class="mb-4">Surat Peringatan</h4>
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
                  <th>Aksi</th>
                </thead>
                <tbody>
                  @foreach ($sp as $d)
                  <tr>
                    <td>{{ $d->name }}</td>
                    <td>{{ $d->surat_peringatan }}</td>
                    <td>{{ $d->pelanggaran }}</td>
                    <td>
                      <div class="dropdown">
                          <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                              aria-expanded="false">
                              <i class="bi bi-gear me-3"></i>Option
                          </button>
                          <ul class="dropdown-menu">
                              <li><a class="dropdown-item"
                                      href="{{ route('sp.edit', ['id' => $d->id]) }}"><i
                                          class="bi bi-pen me-2"></i>Edit</a></li>
                              <li>
                                  <form id="hapus-sp-{{ $d->id }}" action="{{ route('sp.destroy', ['id' => $d->id]) }}" method="POST" class="form-delete">
                                      @csrf
                                      @method('DELETE')
                                      <button type="button" class="dropdown-item text-danger btn-delete" id="btnHapusSp{{ $d->id }}"><i class="bi bi-trash3 me-2"></i>Delete</button>
                                  </form>
                                    <script>
                                      document.addEventListener('DOMContentLoaded', function() {
                                          document.getElementById('btnHapusSp{{ $d->id }}').addEventListener('click', function() {
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
                                                      document.getElementById('hapus-sp-{{ $d->id }}').submit();
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