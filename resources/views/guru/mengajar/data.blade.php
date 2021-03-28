@extends('layouts.base')

@section('navbar')
  @include('components.navbar-guru')
@endsection

@section('header-sidebar')
  <h1>Data Mengajar</h1>
@endsection

@section('content')
  <table>
    <tr>
      <th>No</th>
      <th>Mata Pelajaran</th>
      <th>Kelas</th>
      <th>Opsi</th>
    </tr>
    @foreach ($data as $key => $item)
      <tr>
        <td>{{ $key+1 }}</td>
        <td>{{ $item->mapel }}</td>
        <td>{{ $item->kelas }}</td>
        <td>
          <a href="{{ route('view.data.nilai', $item->id) }}">Detail Nilai</a>
        </td>
      </tr>
    @endforeach
  </table>
@endsection