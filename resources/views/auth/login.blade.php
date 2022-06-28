@extends("layouts.app")

@section("extraHeadTags")
<link href="{{ URL::asset('css/card.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/form.css') }}" rel="stylesheet">
@endSection

@section("title", "Login")

@section("content")
  <form class="card loginForm" action="{{ route("login-user") }}" method="post">
    @csrf
    <h4>Logar</h4>
    <input type="text" name="email" placeholder="E-mail" value="{{ old('email') }}">
    @error("email")<span class="errorMsg">{{ $message }} </span>@enderror
    <input type="password" name="password" placeholder="Senha">
    @error("password")<span class="errorMsg">{{ $message }} </span>@enderror
    <a href="register">Ainda não tenho uma conta, quero me registrar</a>
    <button type="submit">Logar</button>
  </form>
@endSection