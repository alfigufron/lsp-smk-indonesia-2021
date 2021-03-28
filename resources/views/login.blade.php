@extends('layouts.base')

@section('navbar')
  @include('components.navbar')
@endsection

@section('header-sidebar')
  <h1>Login {{ ucwords($role) }}</h1>
@endsection

@section('body-sidebar')
  <form action="{{ route('login', $role) }}" method="post">
    @csrf

    @if ($role === 'admin')
      <label>Username</label><br>
      <input type="text" name="username"><br>
    @elseif ($role === 'guru')
      <label>Nomor Induk Pegawai</label><br>
      <input type="text" name="nomor_induk_pegawai"><br>
    @else
      <label>Nomor Induk Siswa</label><br>
      <input type="text" name="nomor_induk_siswa"><br>
    @endif

    <label>Password</label><br>
    <input type="password" name="password"><br>

    <button type="submit">Login</button>
  </form>
@endsection