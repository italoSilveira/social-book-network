<!DOCTYPE html>
<html>
<head>  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href= "{{ asset('css/app.css') }}" rel="stylesheet">
    <link href= "{{ asset('bootstrap/css/modern-business.css') }}" rel="stylesheet">   
    <script type="text/javascript" src="<?php echo asset('js/app.js')?>"></script>
    <title>Some titles, i dont know yet</title>
</head>
<body>
  @include('navbar')
  <br>
  @yield('body')
</body>
</html>