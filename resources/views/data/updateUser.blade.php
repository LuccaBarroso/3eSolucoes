@extends("layouts.app")
<link href="{{ URL::asset('css/card.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/form.css') }}" rel="stylesheet">
@section("title", "Register")


@section("topnavbtns")
<a class="btn" href="/"><x-heroicon-o-users /></a>
<a class="btn" href="/delete"><x-monoicon-delete /></a>
<a href="/logout" class="btn"><x-heroicon-o-logout /></a>
@endsection

@section("content")
<form class="card" action="{{ route('edit-user') }}" method="post">
  @csrf
  <h4>Editar</h4>
    <input type="text" name="name" placeholder="Nome" value="{{ old('name') ? old('name') : $user->name }}">
    @error("name")<span class="errorMsg">{{ $message }} </span>@enderror
    <input type="text" name="email" placeholder="E-mail" value="{{ old('email') ? old('email') : $user->email }}">
    @error("email")<span class="errorMsg">{{ $message }} </span>@enderror
    <input type="text" name="phone" placeholder="Telefone" value="{{ old('phone') ? old('phone') : $user->phone }}">
    @error("phone")<span class="errorMsg">{{ $message }} </span>@enderror
    <div class="selectInput">
      <label for="status">Status:</label>
      <select name="status" value="{{ old('status') ? old('status') : $user->status }}">
        <option value="Empregado">Empregado</option>
        <option value="Desempregado">Desempregado</option>
      </select>
    </div>
    @error("status")<span class="errorMsg" >{{ $message }} </span>@enderror
    <button type="submit">Editar</button>
  </form>
@endSection