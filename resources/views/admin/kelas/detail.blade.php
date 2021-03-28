@extends('layouts.base')

@section('navbar')
  @include('components.navbar-admin')
@endsection

@section('header-sidebar')
  <h1>Detail Kelas</h1>
@endsection

@section('body-sidebar')
  <form action="{{ route('update.data.kelas', $data->id) }}" method="post">
    @csrf

    <label>Nama</label><br>
    <input type="text" name="nama" value="{{ $data->nama }}"><br>

    <label>Jurusan</label><br>
    <select name="jurusan">
      @foreach ($data_jurusan as $key => $item)
        <option value="{{ $item->id }}"
          @if($item->id === $data->id_jurusan) selected @endif
        >
          {{ $item->nama }}
        </option>
      @endforeach
    </select><br>

    <button type="submit">Perbarui</button>
  </form><br>

  <a href="{{ route('view.data.kelas') }}">Kembali</a>
@endsection