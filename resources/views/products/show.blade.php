@extends('layouts.dev')
@section('content')
<div class="container">


      <!-- Portfolio Item Heading -->
      <h1 class="my-4">{{ $products->name }} <small> de <a href="{{ route('profile.user_profile', $products->user->id) }}">{{$products->user->name}} </a></small>
        <small>@if(Auth::check())
          @if(Auth::user()->id == $products->user_id)
          <a href="{{ route('products.edit', $products->id) }}">
            <button class="btn btn-default pull-right">
              Editar
            </button>
          </a>
          @else
            <a href="{{ route('exchange.new', $products->user->id)}}">
              <button class="btn btn-default pull-right">
                Solicitar Intercambio
              </button>
            </a>
          @endif
      @endif
    </small>
      </h1>

      <!-- Portfolio Item Row -->
      <div class="row">

        <div class="col-md-8">
          <img class="img-fluid" src="/uploads/productos/{{ $products->image }}">
        </div>

        <div class="col-md-4">
          <h3 class="my-3">Descripcion del producto </h3>
          <p>
              {{ $products->body }}
          </p>
          <h3 class="my-3">Detalles</h3>
          <ul>
            <li>{{ $products->short }}</li>
          </ul>
        </div>

      </div>
      <!-- /.row -->

      <!-- Related Projects Row -->
      <h3 class="my-4">Otros articulos</h3>

      <div class="row">

        <div class="col-md-3 col-sm-6 mb-4">
          <a href="#">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
          </a>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
          <a href="#">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
          </a>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
          <a href="#">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
          </a>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
          <a href="#">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
          </a>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

@endsection
