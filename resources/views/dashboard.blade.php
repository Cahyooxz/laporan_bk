@extends('layouts.app')
@section('content')
  @if(auth()->user()->role === 'admin')
  @include('dashboard.siswa_dashboard')
  @elseif(auth()->user()->role === 'guru')
  @include('dashboard.admin_dashboard')
  @elseif(auth()->user()->role === 'siswa')
  @include('dashboard.siswa_dashboard')
  @endif
@endsection