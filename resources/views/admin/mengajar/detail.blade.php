@extends('layouts.base')

@section('navbar')
  @include('components.navbar-admin')
@endsection

@section('header-sidebar')
  <h1>Detail Mengajar</h1>
@endsection

@section('body-sidebar')
  <form action="{{ route('update.data.mengajar', $data->id) }}" method="post">
    @csrf

    <label>Guru</label><br>
    <select name="guru">
      @foreach ($data_guru as $item)
        <option value="{{ $item->nip }}"
          @if($data->nip === "$item->nip")
            selected
          @endif
        >
          {{ $item->nama }}
        </option>
      @endforeach
    </select><br>

    <label>Mata Pelajaran</label><br>
    <select name="mata_pelajaran">
      @foreach ($data_mapel as $item)
        <option value="{{ $item->id }}"
          @if($data->id_mapel === $item->id)
            selected
          @endif
        >
          {{ $item->nama }}
        </option>
      @endforeach
    </select><br>

    <label>Kelas</label><br>
    <select name="kelas">
      @foreach ($data_kelas as $item)
        <option value="{{ $item->id }}"
          @if($data->id_kelas === $item->id)
            selected
          @endif
        >
          {{ $item->nama_kelas }}
        </option>
      @endforeach
    </select><br>

    <button type="submit">Perbarui</button>
  </form><br>

  <a href="{{ route('view.data.mengajar') }}">Kembali</a>
@endsection