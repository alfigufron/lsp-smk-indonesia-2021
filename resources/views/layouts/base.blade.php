<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>SMK Indonesia</title>

  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <div class="wrapper">
    <div class="cover">
      <img src="{{ asset('img/header.jpg') }}" alt="cover-img">
    </div>

    @yield('navbar')

    <div class="body-wrapper">
      <div class="sidebar">
        <div class="header">
          @yield('header-sidebar')
        </div>
        <div class="body">
          @yield('body-sidebar')

          <br>
          @if ($errors->any())
            <span>{{ ucwords($errors->first()) }}</span>
          @endif
        </div>
      </div>
      <div class="content">
        @yield('content')
      </div>
    </div>

    <div class="footer">
      SMK Indonesia &copy; LSP 2021
    </div>
  </div>
</body>
</html>