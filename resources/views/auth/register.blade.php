@extends("layouts.app")
<link href="{{ URL::asset('css/card.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/form.css') }}" rel="stylesheet">
@section("title", "Register")
@section("content")
<form class="card" action="{{ route('register-user') }}" method="post">
  @csrf
  <h4>Registrar</h4>
    <input type="text" name="name" placeholder="Nome" value="{{ old('name') }}">
    @error("name")<span class="errorMsg">{{ $message }} </span>@enderror
    <input type="text" name="email" placeholder="E-mail" value="{{ old('email') }}">
    @error("email")<span class="errorMsg">{{ $message }} </span>@enderror
    <input type="text" name="phone" placeholder="Telefone" value="{{ old('phone') }}">
    @error("phone")<span class="errorMsg">{{ $message }} </span>@enderror
    <div class="selectInput">
      <label for="status">Status:</label>
      <select name="status" value="{{ old('status') }}">
        <option value="Empregado">Empregado</option>
        <option value="Desempregado">Desempregado</option>
      </select>
    </div>
    @error("status")<span class="errorMsg" >{{ $message }} </span>@enderror
    <input type="password" name="password" placeholder="Senha">
    @error("password")<span class="errorMsg">{{ $message }} </span>@enderror
    <input type="password" name="confirmPassword" placeholder="Confirme Senha">
    @error("confirmPassword")<span class="errorMsg">{{ $message }} </span>@enderror
    <a href="login">Já tenho conta, quero me logar</a>
    <button type="submit">Registrar</button>
  </form>
@endSection