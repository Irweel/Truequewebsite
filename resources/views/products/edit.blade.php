@extends('layouts.dev')
@section('content')
<div class="container">

  <div class="justify-content-center text-center">
    @include('products.fragment.aside')
  </div>

  <div class="row">
    <h2 class="col-sm-8" style="padding-top:15px;">
        Editar Producto: {{ $products->name }}
        <a href="{{ route('products.index') }}">
          <button class="btn btn-default pull-right">
            Listado
          </button>
        </a>
    </h2>

@include('products.fragment.error')

    {!! Form::model($products, ['route' => ['products.update', $products->id], 'method' => 'PUT']) !!}

    @include('products.fragment.form')

    {!! Form::close() !!}

  </div>
</div>
@endsection

