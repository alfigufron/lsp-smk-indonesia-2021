@extends('layouts.base')

@section('navbar')
  @include('components.navbar-admin')
@endsection

@section('header-sidebar')
  <h1>Detail Jurusan</h1>
@endsection

@section('body-sidebar')
  <form action="{{ route('update.data.jurusan', $data->id) }}" method="post">
    @csrf

    <label>Nama</label><br>
    <input type="text" name="nama" value="{{ $data->nama }}"><br>

    <button type="submit">Perbarui</button>
  </form><br>

  <a href="{{ route('view.data.jurusan') }}">Kembali</a>
@endsection