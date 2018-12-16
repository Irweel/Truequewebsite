@extends('layouts.dev')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-sm-8">
      <h2 style="padding-bottom: 10px; padding-top: 30px;">listado de productos
        <a href="{{ route('products.create')}}" class="btn btn-warning float-right">+</a>
      </h2>
    <table class="table table-hover table-striped">
      <thead>
        <tr>
          <th>Vendedor </th>
          <th width="20px">ID</th>
          <th> Nombre del producto</th>
          <th colspan="3">&nbsp;</th>
        </tr>
      <thead>
      <tbody>
        @foreach($products as $product)
          <tr>
              <td>{{ $product->user_id }} </td>
              <td>{{ $product->id }}</td>
              <td>{{ $product->name }}</td>
              <td><a href="{{ route('products.show', $product->id) }}">ver</a></td>
              <td>editar</td>
              <td>
              borrar
              </td>
          </tr>
        @endforeach
      </tbody>
    </table>
{!! $products->render() !!}

    </div>
    <div class="col-sm-4">
      mensaje
    </div>
  </div>
</div>
@endsection
