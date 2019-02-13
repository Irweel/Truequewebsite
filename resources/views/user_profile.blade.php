@extends('layouts.dev')

@section('content')

<br>
<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h2>
                                        {{ $user->name}}
                                    </h2>

                                    <p class="proile-rating">

                                    <div class="rating" data-rate-value=0></div>
                                      <a role="button" href="#" id="hola">Rate {{ $user->name}}!</a>
                                          <p class="sent"><p>
                                    </p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Datos de Contacto</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Productos</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $user->id}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $user->name}}</p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $user->email}}</p>
                                            </div>
                                        </div>

                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                              <div class="row">

                                @foreach($products as $product)

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
                                          <a href="{{ route('exchange.new', $product->user->id)}}">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Solicitar trueque a {{ $product->user->name}}
                                            </button>
                                          </a>
                                        @endif
                                      @else
                                        <a href="{{ url('login')}}">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Solicitar trueque a {{ $product->user->name}}
                                        </button>
                                      </a>
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
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

@endsection