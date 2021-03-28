@extends('layouts.base')

@section('navbar')
  @include('components.navbar-admin')
@endsection

@section('header-sidebar')
  <h1>Data Mata Pelajaran</h1>
@endsection

@section('body-sidebar')
  <form action="{{ route('update.data.mapel', $data->id) }}" method="post">
    @csrf

    <label>Kode</label><br>
    <input type="text" name="kode" value="{{ $data->kode }}"><br>

    <label>Nama</label><br>
    <input type="text" name="nama" value="{{ $data->nama }}"><br>

    <button type="submit">Perbarui</button>
  </form><br>

  <a href="{{ route('view.data.mapel') }}">Kembali</a>
@endsection