@extends('layouts.base')

@section('navbar')
  @include('components.navbar-admin')
@endsection

@section('header-sidebar')
  <h1>Data Guru</h1>
@endsection

@section('body-sidebar')
  <form action="{{ route('create.data.guru') }}" method="post">
    @csrf

    <label>Nomor Induk Pegawai</label><br>
    <input type="text" name="nomor_induk_pegawai"><br>

    <label>Nama</label><br>
    <input type="text" name="nama"><br>
    
    <label>Jenis Kelamin</label><br>
    <select name="jenis_kelamin">
      <option value="L">Laki-laki</option>
      <option value="P">Perempuan</option>
    </select><br>

    <label>Alamat</label><br>
    <textarea name="alamat"></textarea><br>

    <label>Password</label><br>
    <input type="text" name="password"><br>

    <button type="submit">Tambah</button>
  </form>
@endsection

@section('content')
  <table>
    <tr>
      <th>No</th>
      <th>Nomor Induk Pegawai</th>
      <th>Nama</th>
      <th>Jenis Kelamin</th>
      <th>Alamat</th>
      <th>Password</th>
      <th>Opsi</th>
    </tr>
    @foreach ($data as $key => $item)
      <tr>
        <td>{{ $key+1 }}</td>
        <td>{{ $item->nip }}</td>
        <td>{{ $item->nama }}</td>
        <td>
          @if ($item->jk === 'L')
            Laki-laki
          @else
            Perempuan
          @endif
        </td>
        <td>{{ $item->alamat }}</td>
        <td>{{ $item->password }}</td>
        <td>
          <a href="{{ route('detail.data.guru', $item->nip) }}">Edit</a>
          <a href="{{ route('delete.data.guru', $item->nip) }}">Hapus</a>
        </td>
      </tr>
    @endforeach
  </table>
@endsection