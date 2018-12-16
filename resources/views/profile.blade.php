@extends('layouts.dev')

@section('content')

<div class="container">
  <h2 style="margin-top: 20px; margin-bottom: 20px;">{{ $user->name }}</h2>
  <hr>
  <div class="row">
  <!-- left column -->
    <div class="col-md-3">
      <div class="text-center">
        <img src="/uploads/avatars/{{ $user->avatar }}" class="avatar img-circle" alt="avatar"style="width:150px; height:150px;border-radius:50%;">
        <form enctype="multipart/form-data" action="/profile" method="POST">
          <label>Cambiar Imagen de Perfil</label>
        </form>
        <input type="file" class="form-control">
      </div>
    </div>

    <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
          <strong>Adventencia!</strong> Para cambiar datos se necesita confirmación.
        </div>
        <h3 style="margin-top: 20px; margin-bottom: 20px;">Información Personal</h3>

        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-lg-3 control-label">Nombre:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="{{ $user->name }}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Ciudad::</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" value="Buenos Aires">
              </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" value="{{ $user->email }}">
              </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Zona Horaria:</label>
            <div class="col-lg-8">
              <div class="ui-select">
                <select id="user_time_zone" class="form-control">
                  <option value="Hawaii">(GMT-10:00) Hawaii</option>
                  <option value="Alaska">(GMT-09:00) Alaska</option>
                  <option value="Pacific Time (US &amp; Canada)">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                  <option value="Arizona">(GMT-07:00) Arizona</option>
                  <option value="Mountain Time (US &amp; Canada)">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                  <option value="Central Time (US &amp; Canada)" selected="selected">(GMT-06:00) Central Time (US &amp; Canada)</option>
                  <option value="Eastern Time (US &amp; Canada)">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                  <option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Username:</label>
              <div class="col-md-8">
                <input class="form-control" type="text" value="{{ $user->name }}">
              </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
              <div class="col-md-8">
                <input class="form-control" type="password" value="{{ $user->password }}">
              </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Confirm password:</label>
              <div class="col-md-8">
                <input class="form-control" type="password" value="{{ $user->password }}">
              </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
              <div class="col-md-8">
                <input type="submite" class="btn btn-primary" value="Save Changes">
                <span></span>
                <input type="reset" class="btn btn-default" value="Cancel">
              </div>
        </div>
      </form>
    </div>
  </div>
</div>
<hr>

@endsection
