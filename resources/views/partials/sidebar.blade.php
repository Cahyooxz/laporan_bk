<div class="col-2 bg-sidebar sidebar p-3 min-vh-100 position-fixed d-none d-md-block min-vh-100 mb-5">
    <div class="text-center border-bottom mb-4 d-flex justify-content-center align-items-center flex-column">
        <img src="{{ asset('img/logo1.png') }}" alt="" width="50px" class="mt-3 mb-3 d-none d-sm-block">
        <p class="mt-1 text-light mb-3">Presstase.</p>
    </div>
    <ul class="p-0 d-flex flex-column d-flex gap-2 overflow-y-auto" style="height: 80vh">
        @if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('guru') || auth()->user()->hasRole('siswa'))
        {{-- <li class="list-group list text-medium cursor-pointer {{ ($title == "Data Profile") ? 'list-active' : '' }} text-center text-md-start">
            <a href="" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-user me-3"></i>Profile</a>
        </li> --}}
        <li class="list-group list text-medium cursor-pointer text-center text-md-start {{ $title === 'Dashboard' ? 'list-active' : ''}}">
            <a href="{{ route('dashboard') }}" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-house-chimney-user me-3"></i>Dashboard</a>
        </li>
        @endif

        @if (auth()->user()->hasRole('admin'))
        <li class="list-group list text-medium cursor-pointer text-center text-md-start">
            <a href="{{ route('jurusan')}}" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-school-flag me-3"></i>Data Jurusan</a>
        </li>
        <li class="list-group list text-medium cursor-pointer text-center text-md-start {{ $title === 'Data Users' || $title === 'Tambah Data Users' || $title === 'Edit Data Users' ? 'list-active' : ''}}">
            <a href="{{ route('users.index') }}" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-users me-3"></i>Users</a>
        </li>
        <li class="list-group list text-medium cursor-pointer text-center text-md-start">
            <a href="{{ route('users.admin')}}" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-user-gear me-3"></i>Admin</a>
        </li>
        <li class="list-group list text-medium cursor-pointer text-center text-md-start">
            <a href="{{ route('users.guru')}}" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-chalkboard-user me-3"></i>Guru</a>
        </li>
        <li class="list-group list text-medium cursor-pointer text-center text-md-start">
            <a href="{{ route('users.siswa')}}" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-graduation-cap me-3"></i>Siswa</a>
        </li>
        <li class="list-group list text-medium cursor-pointer text-center text-md-start  {{ $title === 'Prestasi Siswa' || $title === 'Tambah Rimayat Prestasi Siswa' || $title === 'Edit Prestasi Siswa' ? 'list-active' : ''}}">
            <a href="{{ route('prestasi.index') }}" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-trophy me-3" {{ $title === 'Dashboard' ? 'list-active' : ''}}></i>Prestasi</a>
        </li>
        <li class="list-group list text-medium cursor-pointer text-center text-md-start {{ $title === 'Surat Peringatan' || $title === 'Buat Surat Peringatan' || $title === 'Edit Surat Peringatan'? 'list-active' : ''}}">
            <a href="{{ route('sp.index') }}" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-file-circle-exclamation me-3"></i>Surat Peringatan (SP)</a>
        </li>
        @endif
        @if (auth()->user()->hasRole('guru'))
        <li class="list-group list text-medium cursor-pointer text-center text-md-start">
            <a href="{{ route('jurusan')}}" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-school-flag me-3"></i>Data Jurusan</a>
        </li>
        <li class="list-group list text-medium cursor-pointer text-center text-md-start">
            <a href="{{ route('prestasi.index') }}" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-trophy me-3"></i>Prestasi</a>
        </li>
        <li class="list-group list text-medium cursor-pointer text-center text-md-start">
            <a href="{{ route('sp.index') }}" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-file-circle-exclamation me-3"></i>Surat Peringatan (SP)</a>
        </li>
        @endif

        @if (auth()->user()->hasRole('siswa'))
        <li class="list-group list text-medium cursor-pointer text-center text-md-start {{ $title === 'Prestasi Siswa' ? 'list-active' : ''}}">
            <a href="{{ route('prestasi') }}" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-trophy me-3"></i>Prestasi</a>
        </li>
        <li class="list-group list text-medium cursor-pointer text-center text-md-start {{ $title === 'Surat Peringatanmu' ? 'list-active' : ''}}">
            <a href="{{ route('sp') }}" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-file-circle-exclamation me-3"></i>Surat Peringatan (SP)</a>
        </li>
        @endif
        <li class="list-group list-logout text-medium cursor-pointer text-center rounded text-md-start mb-5">
            <form  action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="button-logout a-icon d-none d-md-block py-2 px-3 rounded"><i class="fa-solid fa-right-from-bracket me-3"></i>Logout</a>
            </form>
        </li>
    </ul> 
</div> 
