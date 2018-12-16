@extends('layouts.dev')
@section('content')
<div class="container">
  <div class="justify-content-center text-center">
    @include('products.fragment.aside')
  </div>
  <div class="row">
    <h2 class="col-sm-8" style="padding-top:15px;">
        {{ $products->name }}
        <a href="{{ route('products.edit', $products->id) }}">
          <button class="btn btn-default pull-right">
            Editar
          </button>
        </a>
    </h2>
  </div>
    <p class="justify-content-center">
      {{ $products->short }}
    </p>
    {!! $products->body !!}
</div>



@endsection
