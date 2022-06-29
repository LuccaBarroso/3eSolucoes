@extends("layouts.app")
<link href="{{ URL::asset('css/card.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/form.css') }}" rel="stylesheet">
@section("title", "Register")


@section("topnavbtns")
<a class="btn" href="/"><x-heroicon-o-users /></a>
<a class="btn" href="/edit"><x-far-edit /></a>
<a href="/logout" class="btn"><x-heroicon-o-logout /></a>
@endsection

@section("content")
<form class="card" action="{{ route('delete-user') }}" method="post">
  @csrf
  <h4>Deletando Conta</h4>
   <p>Tem certeza que deseja deletar <span>para sempre</span> a conta no email {{ $userEmail }}?</p>
    <button type="submit">Deletar</button>
  </form>
@endSection