@extends('layouts.base')

@section('navbar')
  @include('components.navbar-admin')
@endsection

@section('header-sidebar')
  <h1>Data Siswa</h1>
@endsection

@section('body-sidebar')
  <form action="{{ route('create.data.siswa') }}" method="post">
    @csrf

    <label>Nomor Induk Siswa</label><br>
    <input type="text" name="nomor_induk_siswa"><br>

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

    <label>Kelas</label><br>
    <select name="kelas">
      @foreach($data_kelas as $item)
        <option value="{{ $item->id }}">{{ $item->nama_kelas }}</option>
      @endforeach
    </select><br>

    <button type="submit">Tambah</button>
  </form>
@endsection

@section('content')
  <table>
    <tr>
      <th>No</th>
      <th>Nomor Induk Siswa</th>
      <th>Nama</th>
      <th>Jenis Kelamin</th>
      <th>Alamat</th>
      <th>Password</th>
      <th>Kelas</th>
      <th>Jurusan</th>
      <th>Opsi</th>
    </tr>
    @foreach ($data as $key => $item)
      <tr>
        <td>{{ $key+1 }}</td>
        <td>{{ $item->nis }}</td>
        <td>{{ $item->nama_siswa }}</td>
        <td>
          @if($item->jk === 'L')
            Laki-laki
          @else
            Perempuan
          @endif
        </td>
        <td>{{ $item->alamat }}</td>
        <td>{{ $item->password }}</td>
        <td>{{ $item->kelas }}</td>
        <td>{{ $item->jurusan }}</td>
        <td>
          <a href="{{ route('detail.data.siswa', $item->nis) }}">Edit</a>
          <a href="{{ route('delete.data.siswa', $item->nis) }}">Hapus</a>
        </td>
      </tr>
    @endforeach
  </table>
@endsection