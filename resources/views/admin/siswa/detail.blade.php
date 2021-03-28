@extends('layouts.base')

@section('navbar')
  @include('components.navbar-admin')
@endsection

@section('header-sidebar')
  <h1>Detail Siswa</h1>
@endsection

@section('body-sidebar')
  <form action="{{ route('update.data.siswa', $data->nis) }}" method="post">
    @csrf

    <label>Nomor Induk Siswa</label><br>
    <input type="text" name="nomor_induk_siswa" value="{{ $data->nis }}" disabled><br>

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

    <label>Kelas</label><br>
    <select name="kelas">
      @foreach($data_kelas as $item)
        <option value="{{ $item->id }}"
          @if($item->id === $data->id_kelas)
            selected
          @endif
        >
          {{ $item->nama_kelas }}
        </option>
      @endforeach
    </select><br>

    <button type="submit">Perbarui</button>
  </form><br>

  <a href="{{ route('view.data.siswa') }}">Kembali</a>
@endsection