<nav class="navbar navbar-expand-lg navbar-dark d-block d-md-none navbar-color">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('dashboard') }}">Kariermu.</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
      <div class="offcanvas-header bg-sidebar">
        <h5 class="offcanvas-title text-light" id="offcanvasExampleLabel">Kariermu.</h5>
        <button type="button" class="ms-auto button button-s" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
      </div>
      <div class="offcanvas-body bg-sidebar">
        <div>
          <div class="col bg-sidebar sidebar min-vh-100">
            <ul class="p-0 d-flex flex-column d-flex justify-content-center align-items-center gap-2">
                {{-- profile --}}
                @if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('guru') || auth()->user()->hasRole('siswa'))
                  <li class="list-group w-100 list text-medium cursor-pointer text-md-start">
                      {{-- paddingnya di a href --}}
                      <a href="" class="a-icon py-2 px-3"><i class="fa-solid fa-user me-3"></i>Profile</a>
                  </li>
                  {{-- dashboard --}}
                  <li class="list-group w-100 list text-medium cursor-pointer text-md-start">
                    {{-- paddingnya di a href --}}
                    <a href="{{ route('dashboard') }}" class="a-icon py-2 px-3"><i class="fa-solid fa-house-chimney-user me-3"></i>Dashboard</a>
                  </li>
                @endif
                @if(auth()->user()->hasRole('admin'))
                <li class="list-group w-100 list text-medium cursor-pointer text-md-start">
                  {{-- paddingnya di a href --}}
                  <a href="" class="a-icon py-2 px-3"><i class="fa-solid fa-school-flag me-3"></i>Data Jurusan</a>
                </li>
                {{-- data guru --}}
                <li class="list-group w-100 list text-medium cursor-pointer text-md-start">
                    <a href="" class="a-icon py-2 px-3"><i class="fa-solid fa-users me-3"></i>Users</a>
                </li>
                <li class="list-group w-100 list text-medium cursor-pointer text-md-start">
                    <a href="" class="a-icon py-2 px-3"><i class="fa-solid fa-chalkboard-user me-3"></i>Guru</a>
                </li>
                {{-- data siswa --}}
                <li class="list-group w-100 list text-medium cursor-pointer text-md-start">
                    <a href="" class="a-icon py-2 px-3"><i class="fa-solid fa-graduation-cap me-3"></i>Siswa</a>
                </li>
                @endif
                @if(auth()->user()->hasRole('guru'))
                <li class="list-group w-100 list text-medium cursor-pointer text-md-start">
                  {{-- paddingnya di a href --}}
                  <a href="" class="a-icon py-2 px-3"><i class="fa-solid fa-school-flag me-3"></i>Data Jurusan</a>
                </li>
                <li class="list-group w-100 list text-medium cursor-pointer text-md-start">
                    <a href="" class="a-icon py-2 px-3"><i class="fa-solid fa-chalkboard-user me-3"></i>Guru</a>
                </li>
                {{-- data siswa --}}
                <li class="list-group w-100 list text-medium cursor-pointer text-md-start">
                    <a href="" class="a-icon py-2 px-3"><i class="fa-solid fa-graduation-cap me-3"></i>Siswa</a>
                </li>
                @endif
                @if (auth()->user()->hasRole('siswa'))
                  {{-- data karir --}}
                  <li class="list-group w-100 list text-medium cursor-pointer text-md-start">
                      <a href="{{ route('prestasi') }}" class="a-icon py-2 px-3"><i class="fa-solid fa-trophy me-3"></i>Prestasi</a>
                  </li>
                  {{-- data nilai  --}}
                  <li class="list-group w-100 list text-medium cursor-pointer text-md-start">
                      <a href="{{ route('sp') }}" class="a-icon py-2 px-3"><i class="fa-solid fa-file-circle-exclamation me-3"></i>Surat Peringatan (SP)</a>
                  </li>
                @endif
                {{-- logout --}}
                <li class="list-group w-100 list-logout text-medium cursor-pointer rounded text-md-start">
                    <form  action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="button-logout a-icon py-2 px-3 rounded"><i class="fa-solid fa-right-from-bracket me-3"></i>Logout</a>
                    </form>
                </li>
            </ul> 
        </div>
        </div>
      </div>
    </div>
  </div>
</nav>