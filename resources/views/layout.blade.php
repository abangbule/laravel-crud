<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Laravel 5.7 CRUD Example Tutorial</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/sweetalert2.css') }}" rel="stylesheet" type="text/css" />
  <script src="{{ asset('js/jquery-3.3.1.js') }}" type="text/js"></script>
</head>
<body>
  <div class="container">
    @yield('content')
  </div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
  <script src="{{ asset('js/sweetalert2.js') }}" type="text/js"></script>
   
    @yield('page-level-scripts')
</body>
</html>