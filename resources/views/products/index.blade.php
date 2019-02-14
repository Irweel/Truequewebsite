@extends('layouts.dev')
@section('content')


<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-14"l>
      <h2 style="padding-bottom: 30px; padding-top: 30px;" class="justify-content-center text-center col-12">
      Listado de productos
  @if(Auth::check())
        <a href="{{ route('products.create')}}">
          <button class="btn btn-warning pull-right">Subir Articulo</button>
        </a>
    @else
        <a href="{{ url('login')}}">
          <button class="btn btn-warning pull-right">Subir Articulo</button>
        </a>
    @endif
      </h2>
      <div class="justify-content-center text-center">
        @include('products.fragment.aside')
      </div>
      @include('products.fragment.info')
    </div>
  </div>

  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Productos</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Usuarios</a>
    </li>
  </ul>

<div class="tab-content profile-tab" id="myTabContent">
<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <div class="card-body">
      @foreach($products as $product)
      <!-- DISENO PRODUCTO -->  
      <div class="row" style="margin-top:10px;" >
        <div class="col-14 col-sm-12 col-md-2 text-center" style="margin-bottom:10px;">
          <span class="align-middle">
          @if($product->image == 'default.jpg')
            <img class="img-fluid" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 125px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22348%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20348%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_167bb1e5683%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_167bb1e5683%22%3E%3Crect%20width%3D%22348%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22116.5%22%20y%3D%22120.3%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
          @else
            <img class="img-fluid" src="/uploads/productos/{{ $product->image }}"  alt="prewiew" width="100%" height="auto">
          @endif
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
      @if(Auth::check())
            @if(Auth::user()->id == $product->user_id)
              @include('products.fragment.options')
            @endif
      @endif  
        </div>
      </div>
      <hr>
    <!-- END PRODUCT -->  
   @endforeach
      {!! $products->render() !!}
  </div>
</div>
<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  <div class="row">
    @foreach($users as $user)
      <div class="row" style="margin-top:10px;" >
        <div class="col-14 col-sm-12 col-md-2 text-center" style="margin-bottom:10px;">
          <span class="align-middle">
            <img class="img-fluid" src="/uploads/avatars/{{ $user->avatar }}" style="margin-left:30px;" alt="prewiew" width="100%" height="auto">
          </span>
        </div>
        <div class="col-14 text-sm-center col-sm-12 text-md-left col-md-6">
          <h4 class="product-name"style="margin-left:30px;">
          <strong><a href="{{ route('profile.user_profile', $user->id) }}">{{$user->name}}</strong></h4></a>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
