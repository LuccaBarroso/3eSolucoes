<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
  <script src="{{ asset('js/modalCloseBtn.js')}}"></script>
  @yield("extraHeadTags")
  <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>3e Soluções - @yield("title")</title>
</head>
<body>
  <div class="topnav">
    <img id="logo" src="{{ asset('imgs/logo.jpg') }}" alt="">
    <div class="btns">
      {{-- <a href="/login" class="btn"><x-heroicon-o-logout /></a> --}}
      @yield("topnavbtns")
    </div>
  </div>
  <div class="content">   
    @if(isset($msg))
      <div class="modal" id="modal">
        <div class="modalContent">
          <p>{{ $msg }}</p>
        </div>
      </div>
    @endif 
    @if(old("msg"))
      <div class="modal" id="modal">
        <div class="modalContent">
          <p>{{ old("msg") }}</p>
        </div>
      </div>
    @endif 
    @yield("content")
  </div>
</body>
</html>