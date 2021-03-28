@extends('layouts.base')

@section('navbar')
  @include('components.navbar-guru')
@endsection

@section('header-sidebar')
  <h1>Data Nilai</h1>
@endsection

@section('body-sidebar')
  <form action="{{ route('create.data.nilai', $data_mengajar->id) }}" method="post">
    @csrf

    <label>Siswa</label><br>
    <select name="siswa">
      @foreach($data_siswa as $item)
      <option value="{{ $item->nis }}">
        {{ $item->nama }}
      </option>
      @endforeach
    </select><br>

    <label>Ulangan Harian</label><br>
    <input type="number" name="ulangan_harian"><br>

    <label>Ujian Tengah Semester</label><br>
    <input type="number" name="ujian_tengah_semester"><br>

    <label>Ujian Akhir Semester</label><br>
    <input type="number" name="ujian_akhir_semester"><br>

    <button type="submit">Tambah</button>
  </form><br>

  <a href="{{ route('view.data.mengajar.guru') }}">Kembali</a>
@endsection

@section('content')
  <table>
    <tr>
      <th>No</th>
      <th>Nomor Induk Siswa</th>
      <th>Nama</th>
      <th>UH</th>
      <th>UTS</th>
      <th>UAS</th>
      <th>NA</th>
      <th>Opsi</th>
    </tr>
    @foreach ($data as $key => $item)
      <tr>
        <td>{{ $key+1 }}</td>
        <td>{{ $item->nis }}</td>
        <td>{{ $item->nama_siswa }}</td>
        <td>{{ $item->uh }}</td>
        <td>{{ $item->uts }}</td>
        <td>{{ $item->uas }}</td>
        <td>{{ $item->na }}</td>
        <td>
          <a href="{{ route('detail.data.nilai', [$data_mengajar->id, $item->id]) }}">Edit</a>
          <a href="{{ route('delete.data.nilai', [$data_mengajar->id, $item->id]) }}">Hapus</a>
        </td>
      </tr>
    @endforeach
  </table>
@endsection