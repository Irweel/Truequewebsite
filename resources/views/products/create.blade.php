@extends('layouts.dev')
@section('content')

<div class="container">
  <div class="col-sm-8">
    <h2 class="row">
      Nuevo Producto
      <a href="{{ route('products.index') }}" class="btn btn-default pull-right">Listado</a>
    </h2>
  <div class="row">
    @include('products.fragment.aside')
  </div>

  @include('products.fragment.error')

  {!! Form::open(['route' => 'products.store', 'image' => 'true']) !!}

        @include('products.fragment.form')

  {!! Form::close() !!}

  </div>
</div>

@endsection

