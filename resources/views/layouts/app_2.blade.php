<!DOCTYPE html>
<html lang="es">
<head>
  <title>Manos al Ambiente</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link href="{{asset('css/bootstrap.min.css')}}'" rel="stylesheet" type="text/css">
  <link href="{{asset('css/revolution-slider.css')}}'" rel="stylesheet" type="text/css">
  <link href="{{asset('css/mystyle.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('css/responsive.css')}}" rel="stylesheet" type="text/css">
<body>
    <div>     
       @yield('content')
    </div>

  <script src="{{asset('js/jquery.min.js')}}"></script> 
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/popper.min.js')}}"></script>
  <script src="{{asset('js/revolution.min.js')}}"></script>
  <script src="{{asset('js/jquery.fancybox.pack.js')}}"></script>
  <script src="{{asset('js/jquery.fancybox-media.js')}}"></script>
  <script src="{{asset('js/owl.js')}}"></script>
  <script src="{{asset('js/wow.js')}}"></script>
  <script src="{{asset('js/script.js')}}"></script>
    <script src="{{asset('js_/axios.min.js')}}"></script>
    @yield('scripts')
</body>
</html>