@extends('layouts.base')

@section('navbar')
  @include('components.navbar-siswa')
@endsection

@section('header-sidebar')
  <h1>Data Nilai</h1>
@endsection

@section('content')
  <table>
    <tr>
      <th>No</th>
      <th>Nomor Induk Pegawai</th>
      <th>Nama Guru</th>
      <th>Ulangan Harian</th>
      <th>Ujian Tengah Semester</th>
      <th>Ujian Akhir Semester</th>
      <th>Nilai Akhir</th>
    </tr>
    @foreach ($data as $key => $item)
      <tr>
        <td>{{ $key+1 }}</td>
        <td>{{ $item->nip }}</td>
        <td>{{ $item->nama_guru }}</td>
        <td>{{ $item->uh }}</td>
        <td>{{ $item->uts }}</td>
        <td>{{ $item->uas }}</td>
        <td>{{ $item->na }}</td>
      </tr>
    @endforeach
  </table>
@endsection