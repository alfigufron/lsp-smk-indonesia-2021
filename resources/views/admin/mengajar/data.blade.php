@extends('layouts.base')

@section('navbar')
  @include('components.navbar-admin')
@endsection

@section('header-sidebar')
  <h1>Data Mengajar</h1>
@endsection

@section('body-sidebar')
  <form action="{{ route('create.data.mengajar') }}" method="post">
    @csrf

    <label>Guru</label><br>
    <select name="guru">
      @foreach ($data_guru as $item)
        <option value="{{ $item->nip }}">
          {{ $item->nama }}
        </option>
      @endforeach
    </select><br>

    <label>Mata Pelajaran</label><br>
    <select name="mata_pelajaran">
      @foreach ($data_mapel as $item)
        <option value="{{ $item->id }}">
          {{ $item->nama }}
        </option>
      @endforeach
    </select><br>

    <label>Kelas</label><br>
    <select name="kelas">
      @foreach ($data_kelas as $item)
        <option value="{{ $item->id }}">
          {{ $item->nama_kelas }}
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
      <th>Nomor Induk Pegawai</th>
      <th>Nama</th>
      <th>Mata Pelajaran</th>
      <th>Kelas</th>
      <th>Opsi</th>
    </tr>
    @foreach ($data as $key => $item)
      <tr>
        <td>{{ $key+1 }}</td>
        <td>{{ $item->nip }}</td>
        <td>{{ $item->guru }}</td>
        <td>{{ $item->mapel }}</td>
        <td>{{ $item->kelas }}</td>
        <td>
          <a href="{{ route('detail.data.mengajar', $item->id) }}">Edit</a>
          <a href="{{ route('delete.data.mengajar', $item->id) }}">Hapus</a>
        </td>
      </tr>
    @endforeach
  </table>
@endsection