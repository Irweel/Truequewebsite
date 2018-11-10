<section class="jumbotron text-center">
  <div class="container">
    <h1 class="jumbotron-heading">
      <img src="{{ asset('/images/logo.png') }}" style="width:50%;">
    </h1>
    <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sIet, but not too short so folks don't simply skip over it entirely.</p>
    <p>
    @if(Route::has('login'))
        <a href="{{ url('/add-product')}}" class="btn btn-primary">Subir Articulo</a>
        <a href="#" class="btn btn-secondary">Categorias</a>
    @else
        <a href="{{ url('login')}}" class="btn btn-primary">Subir Articulo</a>
        <a href="#" class="btn btn-secondary">Categorias</a>
    @endif
    </p>
  </div>


</section>

