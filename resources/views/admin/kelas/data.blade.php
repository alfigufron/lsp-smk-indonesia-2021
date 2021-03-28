@extends('layouts.base')

@section('navbar')
  @include('components.navbar-admin')
@endsection

@section('header-sidebar')
  <h1>Data Kelas</h1>
@endsection

@section('body-sidebar')
  <form action="{{ route('create.data.kelas') }}" method="post">
    @csrf

    <label>Nama</label><br>
    <input type="text" name="nama"><br>

    <label>Jurusan</label><br>
    <select name="jurusan">
      @foreach ($data_jurusan as $key => $item)
        <option value="{{ $item->id }}">
          {{ $item->nama }}
        </option>
      @endforeach
    </select><br>

    <button type="submit">Tambah</button>
  </form>
@endsection

@section('content')
  <table>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Jurusan</th>
      <th>Opsi</th>
    </tr>
    @foreach ($data as $key => $item)
      <tr>
        <td>{{ $key+1 }}</td>
        <td>{{ $item->nama_kelas }}</td>
        <td>{{ $item->nama_jurusan }}</td>
        <td>
          <a href="{{ route('detail.data.kelas', $item->id) }}">Edit</a>
          <a href="{{ route('delete.data.kelas', $item->id) }}">Hapus</a>
        </td>
      </tr>
    @endforeach
  </table>
@endsection