@extends("layouts.app")

@section("extraHeadTags")
<link href="{{ URL::asset('css/card.css') }}" rel="stylesheet">
@endSection

@section("title", "All Users")

@section("topnavbtns")
<a class="btn" href="/edit"><x-far-edit /></a>
<a class="btn" href="/delete"><x-monoicon-delete /></a>
<a href="/logout" class="btn"><x-heroicon-o-logout /></a>
@endsection

@section("content")
  <div class="card">
    <h4>Bem-Vindo {{ $curUserName }}</h4>
    <p>Esses são os usuários atualmente cadastrados</p>
    <table>
      <thead>
        <tr>
          <th>Nome</th>
          <th>E-mail</th>
          <th>Telefone</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
          <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->status }}</td>
          </tr>
        @endforeach
    </table>
  </div>
@endSection