@extends('layouts.dev')
@section('content')


<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-14"l>
      <h2 style="padding-bottom: 30px; padding-top: 30px;" class="justify-content-center text-center col-12">
      Listado de productos
        <a href="{{ route('products.create')}}">
          <button class="btn btn-warning pull-right">Subir Articulo</button>
        </a>
      </h2>
      <div class="justify-content-center text-center">
        @include('products.fragment.aside')
      </div>
      @include('products.fragment.info')
    </div>
  </div>

  <div class="card-body">
      @foreach($products as $product)
      <!-- DISENO PRODUCTO -->  
      <div class="row" style="margin-top:10px;" >
        <div class="col-14 col-sm-12 col-md-2 text-center" style="margin-bottom:10px;">
          <span class="align-middle">
          <img class="img-fluid"  src="http://placehold.it/120x80" alt="prewiew" width="100%" height="auto">
          </span>
        </div>
        <div class="col-14 text-sm-center col-sm-12 text-md-left col-md-6">
          <h4 class="product-name"><strong><a href="{{ route('products.show', $product->id)}}">{{ $product->name }}</strong></h4>
          </a>
          <h4>
            <small>{{ $product->short}}</small>
          </h4>
        </div>
        <div class="col-14 col-sm-12 text-sm-center col-md-4 text-md-right row" style="margin-top:15px;">
          <div class="col-3 col-sm-3 col-md-4 text-md-right" style="padding-top: 5px">
            <h6><strong>id: {{ $product->id}}</strong></h6>
          </div>

            @if(Auth::user()->id == $product->user_id)
              @include('products.fragment.options')
            @endif
        </div>
      </div>
      <hr>
    <!-- END PRODUCT -->  
   @endforeach
  {!! $products->render() !!}
</div>
@endsection
