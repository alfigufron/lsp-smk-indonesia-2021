@extends('layouts.base')

@section('navbar')
  @include('components.navbar-admin')
@endsection

@section('header-sidebar')
  <h1>Detail Guru</h1>
@endsection

@section('body-sidebar')
  <form action="{{ route('update.data.guru', $data->nip) }}" method="post">
    @csrf

    <label>Nomor Induk Pegawai</label><br>
    <input type="text" name="nomor_induk_pegawai" value="{{ $data->nip }}" disabled><br>

    <label>Nama</label><br>
    <input type="text" name="nama" value="{{ $data->nama }}"><br>
    
    <label>Jenis Kelamin</label><br>
    <select name="jenis_kelamin">
      <option value="L"
      @if($data->jk === 'L')
        selected
      @endif
      >
        Laki-laki
      </option>
      <option value="P"
      @if($data->jk === 'P')
        selected
      @endif
      >
        Perempuan
      </option>
    </select><br>

    <label>Alamat</label><br>
    <textarea name="alamat">{{ $data->alamat }}</textarea><br>

    <label>Password</label><br>
    <input type="text" name="password" value="{{ $data->password }}"><br>

    <button type="submit">Perbarui</button>
  </form><br>

  <a href="{{ route('view.data.guru') }}">Kembali</a>
@endsection