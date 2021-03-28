<div class="navbar">
  <div class="nav-left">
    <ul>
      <li><a href="{{ route('home', 'admin') }}">Home</a></li>
      <li><a href="{{ route('view.data.jurusan') }}">Data Jurusan</a></li>
      <li><a href="{{ route('view.data.kelas') }}">Data Kelas</a></li>
      <li><a href="{{ route('view.data.mapel') }}">Data Mapel</a></li>
      <li><a href="{{ route('view.data.guru') }}">Data Guru</a></li>
      <li><a href="{{ route('view.data.siswa') }}">Data Siswa</a></li>
      <li><a href="{{ route('view.data.mengajar') }}">Data Mengajar</a></li>
    </ul>
  </div>
  <div class="nav-right">
    <ul>
      <li><a href="{{ route('logout') }}">Logout</a></li>
    </ul>
  </div>
</div>