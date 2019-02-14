@extends('layouts.dev')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12 text-center">
      <h1 class="mt-5">Enhorabuena {{ Auth::user()->name }}!</h1>
      <p class="lead">Haz realizado una petición de intercambio, el usuario recibio una notificación con tu propuesta.</p>
      <ul class="list-unstyled">
        <li>
          <a href="{{ url('/') }}">Volver a la home</a>
        </li>
        <li>
          <a href="{{ route('profile.user_profile', Auth::user()->id) }}">Mi Perfil</a></li>
      </ul>
    </div>
  </div>
</div>
@endsection
