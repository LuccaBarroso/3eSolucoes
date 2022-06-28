@extends("layouts.app")
<link href="{{ URL::asset('css/card.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/form.css') }}" rel="stylesheet">
@section("title", "Register")
@section("content")
  <form class="card" action="">
    <h4>Registrar</h4>
    <input type="text" name="name" placeholder="Nome">
    <input type="text" name="email" placeholder="E-mail">
    <input type="text" name="phone" placeholder="Telefone">
    <div class="selectInput">
      <label for="status">Status:</label>
      <select name="status">
        <option value="Empregado">Empregado</option>
        <option value="Desempregado">Desempregado</option>
      </select>
    </div>
    <input type="password" name="password" placeholder="Senha">
    <input type="password" name="confirmPassword" placeholder="Confirme Senha">
    <a href="login">Já tenho conta, quero me logar</a>
    <button type="submit">Registrar</button>
  </form>
@endSection