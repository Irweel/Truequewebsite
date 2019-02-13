@extends('layouts.dev')
@section('content')

@if(session()->has('message'))
    <div class="alert alert-sucess">
        {{ session()->get('message') }}
        {{ session()->get('compFromName') }}

    </div>
@endif
<div class="container text-left col-xs-1 float-sm-left" style="display:none; border:1px solid gray; width:800px; display:inline-block;">
Productos del otro usuario
    <div class="row">

      @foreach($userToProducts as $product)

<!-- DISENO PRODUCTO -->
      <div class="col-4" >
        <div class="card xs-4 box-shadow" style="width: 12rem;">
          @if($product->image == 'default.jpg')
          <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 200px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22348%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20348%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_167bb1e5683%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_167bb1e5683%22%3E%3Crect%20width%3D%22348%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22116.5%22%20y%3D%22120.3%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
          @else
            <img class="card-img-top" src="/uploads/productos/{{ $product->image }}"  style="height: 100px; width: 100%; display: block;" alt="Thumbnail [100%x225]" data-holder-rendered="true">
          @endif
          <div class="card-body">
         <a href="{{ route('products.show', $product->id)}}">{{ $product->name }}</a>
          <p class="card-sm-text" >{{ $product->short}}</p>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
            @if(Auth::check())
              @if(Auth::user()->id == $product->user_id)
                <a href="{{ route('products.edit', $product->id)}}">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Editar</button>
                </a>

              </form>

              @else
                <a href="{{ route('exchange.addProduct', ['id' => $product->id])}}">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Agregar
                  </button>
                </a>
              @endif

            @endif
            </div>


        </div>
      </div>
    </div>
</div>

<!-- END PRODUCT -->
   @endforeach


</div>
</div>

<div class="container " style="display:none; border:1px solid gray; width:800px; display:inline-block;">
    Mis Productos
    <div class="row">

      @foreach($userFromProducts as $product)

<!-- DISENO PRODUCTO -->
      <div class="col-4" >
        <div class="card xs-4 box-shadow" style="width: 12rem;">
          @if($product->image == 'default.jpg')
          <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 200px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22348%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20348%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_167bb1e5683%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_167bb1e5683%22%3E%3Crect%20width%3D%22348%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22116.5%22%20y%3D%22120.3%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
          @else
            <img class="card-img-top" src="/uploads/productos/{{ $product->image }}"  style="height: 100px; width: 100%; display: block;" alt="Thumbnail [100%x225]" data-holder-rendered="true">
          @endif
          <div class="card-body">
         <a href="{{ route('products.show', $product->id)}}">{{ $product->name }}</a>
          <p class="card-sm-text" >{{ $product->short}}</p>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">

                <a href="{{ route('exchange.addProduct', ['id' => $product->id])}}">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Agregar
                  </button>
                </a>

            </div>


        </div>
      </div>
    </div>
</div>

<!-- END PRODUCT -->
   @endforeach
</div>
</div>


      <div class="row">
        <div class = "col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
          <ul class = class = "list-group">

              @foreach($products as $product)
                <li class = "list-group-item">
                  <strong> {{ $product['item']['name'] }}</strong>
                  <div class="btn-group">
                    <button  type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Action<span class = "caret"></span>
                    </button>
                    <ul class= "dropdown-menu">
                      <li><a href="#">Remove</a></li>
                    </ul>
                  </div>
                </li>
              @endforeach
          </ul>
        </div>
      </div>
      <div class="row">
        <div class = "col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">


            @if($button == "Retrueque!"))
              <a href="{{ route('exchange.success', $button)}}">


                <button type="button" class="btn btn-sm btn-outline-secondary">{{ $button }}
                </button>


              </a>
            @else
            <a href="{{ route('exchange.success', $button)}}">


              <button type="button" class="btn btn-sm btn-outline-secondary">{{ $button }}
              </button>


            </a>
            @endif
            <a href="{{ route('exchange.reject')}}">


              <button type="button" class="btn btn-sm btn-outline-secondary">Rechazar Trueque
              </button>


            </a>
        </div>
      </div>





@endsection
