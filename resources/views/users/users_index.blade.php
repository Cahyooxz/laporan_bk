@extends('layouts.app')
@section('content')
  {{-- @if(!$data->isEmpty()) --}}
    <div class="container-fluid mt-5">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="d-flex">
                <a href="{{ route('users.create') }}" class="btn btn-success ms-auto"><i class="fa-solid fa-circle-plus me-3"></i>Tambah Users</a>
              </div>
              <table class="table" id="table-users">
                <thead>
                  <th>NISN/NIP</th>
                  <th>Nama Lengkap</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Aksi</th>
                </thead>
                <tbody>
                  @foreach ($data as $d)
                  <tr>
                    <td>{{ $d->nisn_or_nip }}</td>
                    <td>{{ $d->name }}</td>
                    <td>{{ $d->email }}</td>
                    <td>{{ $d->role }}</td>
                    <td>
                      <td>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="bi bi-gear me-3"></i>Option
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item"
                                        href="{{ route('users.edit', ['id' => $d->id]) }}"><i
                                            class="bi bi-pen me-2"></i>Edit</a></li>
                                <li>
                                    <form id="hapus-users-{{ $d->id }}" action="{{ route('users.destroy', ['id' => $d->id]) }}" method="POST" class="form-delete">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="dropdown-item text-danger btn-delete" id="btnHapusUsers{{ $d->id }}"><i class="bi bi-trash3 me-2"></i>Delete</button>
                                    </form>
                                      <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            document.getElementById('btnHapusUsers{{ $d->id }}').addEventListener('click', function() {
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
                                                        document.getElementById('hapus-users-{{ $d->id }}').submit();
                                                    }
                                                });
                                            });
                                        });
                                      </script>
                                </li>
                            </ul>
                        </div>
                    </td>
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