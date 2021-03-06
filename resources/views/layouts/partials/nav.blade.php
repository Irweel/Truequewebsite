<div class="collapse bg-dark" id="navbarHeader">
  <div class="container">
    <div class="row">
      <div class="col-sm-8 col-md-7 py-4">
        <h4 class="text-white">About</h4>
        <p class="text-muted">Este es un sitio creado por alumnos de la Universidad de Belgrano.
          Meindert Nennhuber, Ignacio Fernadez, Leonardo Inza, Leonardo Antola, Eric Fuan y Iñaki Fernandez.
          El sitio se usa como fuente de intercambios/trueques entre usuarios. Para mas información google.
        </p>
      </div>
      <div class="col-sm-4 offset-md-1 py-4">
          <div class="flex-center position-ref full-height">
          @if (Route::has('login'))
            <div class="top-right links">
              @auth
            <h4 class="text-white"> {{ Auth::user()->name }} </h4>
              <a href="{{ url('/profile') }}" style="padding:5px;">
                <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:32px; height:32px; border-radius:50%">
                  <!-- {{ Auth::user()->name }}-->
                  <span class="caret"></span>
              </a>
              <br>
              <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
              @else
              <a href="{{ url('/home') }}" class="text-white" style="padding:5px;">Home</a>
              <a href="{{ route('login') }}" class="text-white">Login</a>
              <a href="{{ route('register') }}" class="text-white">Registro</a>
              @endauth
            </div>
          @endif

        </div>
      </div>
    </div>
  </div>
</div>
<div class="navbar navbar-dark bg-dark box-shadow">
  <div class="container d-flex justify-content-between">
    <a href="/" class="navbar-brand d-flex align-items-center">
      <strong>El Trueque</strong>
    </a>
    <div class="d-flex m-auto text-center" style="padding-bottom: 10px; padding-top: 10px;">
      <input type="text" class=" align-items-center form-control input-sm" maxlength="64" placeholder="Buscar" />
          <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">
              <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
          </a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
</div>
</div>
