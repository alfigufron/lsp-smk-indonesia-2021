@extends('layouts.base')

@section('navbar')
  @include('components.navbar-admin')
@endsection

@section('header-sidebar')
  <h1>Data Mata Pelajaran</h1>
@endsection

@section('body-sidebar')
  <form action="{{ route('create.data.mapel') }}" method="post">
    @csrf

    <label>Kode</label><br>
    <input type="text" name="kode"><br>

    <label>Nama</label><br>
    <input type="text" name="nama"><br>

    <button type="submit">Tambah</button>
  </form>
@endsection

@section('content')
  <table>
    <tr>
      <th>No</th>
      <th>Kode</th>
      <th>Nama</th>
      <th>Opsi</th>
    </tr>
    @foreach ($data as $key => $item)
      <tr>
        <td>{{ $key+1 }}</td>
        <td>{{ $item->kode }}</td>
        <td>{{ $item->nama }}</td>
        <td>
          <a href="{{ route('detail.data.mapel', $item->id) }}">Edit</a>
          <a href="{{ route('delete.data.mapel', $item->id) }}">Hapus</a>
        </td>
      </tr>
    @endforeach
  </table>
@endsection