@extends('layouts.base')

@section('navbar')
  @include('components.navbar-guru')
@endsection

@section('header-sidebar')
  <h1>Detail Nilai</h1>
@endsection

@section('body-sidebar')
  <form action="{{ route('update.data.nilai', [$data_mengajar->id, $data->id]) }}" method="post">
    @csrf

    <label>Ulangan Harian</label><br>
    <input type="number" name="ulangan_harian" value="{{ $data->uh }}"><br>

    <label>Ujian Tengah Semester</label><br>
    <input type="number" name="ujian_tengah_semester" value="{{ $data->uts }}"><br>

    <label>Ujian Akhir Semester</label><br>
    <input type="number" name="ujian_akhir_semester" value="{{ $data->uas }}"><br>

    <button type="submit">Tambah</button>
  </form><br>

  <a href="{{ route('view.data.nilai', $data_mengajar->id) }}">Kembali</a>
@endsection