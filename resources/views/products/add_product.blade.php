@extends('layouts.deaf')
@section('content')
<form method="POST">
@csrf
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="jumbotron-heading text-center">
      <img src="/images/avatars/default.jpg" style="width:200px; height:200px; padding: 10px;">
      </div>
      <div class="card">
        <div class="card-header">{{ __('Cargar Articulo') }}</div>
          <div class="card-body">
            <div class="form-group row">
              <label class="col-md-4 col-form-label text-md-right">{{ __('Titulo') }}</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="name" value="" required autofocus>
              </div>
            </div>
            <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">{{ __('Imagen') }}</label>
              <div class="col-md-6">
				        <input type="file" name="image" accept="image/*"required autofocus>
              </div>
            </div>
            <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">{{ __('Categoria') }}</label>
              <div class="col-md-6">
				        <select name="categorias" id="input_categorias_id" class="form-control">
					        <option value=" " class="form-control" required autofocus>Electrodomestico</option>
					        <option value=" " class="form-control" required autofocus>Vehiculo</option>
					        <option value=" " class="form-control" required autofocus>Libro</option>
					        <option value=" " class="form-control" required autofocus>--Elija una Categoria--</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>
              <div class="col-md-6">
				        <textarea name="desc" class="form-control" placeholder="Escriba Aqui"></textarea>
              </div>
            </div>
            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Subir Articulo!') }}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
