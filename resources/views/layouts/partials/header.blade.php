<section class="jumbotron text-center">
  <div class="container">
    <h1 class="jumbotron-heading">
      <img src="{{ asset('/images/logo.png') }}" style="width:50%;">
    </h1>
    <p class="lead text-muted">Sitio de intercambio de productos, animales, servicios y bienes, puedes cambiar lo que quieras, todo gratis. El Trueque la mejor opcion de intercambio a nivel mundial.</p>
    <p>
  @if(Auth::check())
        <a href="{{ route('products.create')}}" class="btn btn-primary">Subir Articulo</a>
        <a href="#" class="btn btn-secondary">Categorias</a>
    @else
        <a href="{{ url('login')}}" class="btn btn-primary">Subir Articulo</a>
        <a href="#" class="btn btn-secondary">Registrarse</a>
    @endif
    </p>
  </div>


</section>

