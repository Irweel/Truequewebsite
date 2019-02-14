@extends('layouts.dev')

@section('content')

<div class="container">
  <h2 style="margin-top: 20px; margin-bottom: 20px;">{{ Auth::user()->name }}</h2>
  <hr>
  <div class="row">
  <!-- left column -->
    <div class="col-md-3">
      <div class="text-center">
        <img src="/uploads/avatars/{{ $user->avatar }}" class="avatar img-circle" alt="avatar"style="width:150px; height:150px;border-radius:50%;">
      </div>
<form enctype="multipart/form-data" action="/profile" method="POST">
  <label>Update Profile Image</label>
  <input type="file" name="avatar">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="submit" class="pull-right btn btn-sm btn-primary">
</form>
      <br>
      <div class="text-center">
        <a class="btn btn-primary" style="color: white;" onclick="toggler('hidden');" >historial de trueques</a>
      </div>
    </div>

    <div id="myContent" class="hidden" style=" display:none;">
      @foreach($exchangeFrom as $exchangeInfo)
        id: {{$exchangeInfo->id}}
        @foreach($users as $user)
          @if ( $user->id == $exchangeInfo->user_from )
            con usuario {{$user->name}}
          @endif

        @endforeach
        @foreach($users as $user)
          @if ( $user->id == $exchangeInfo->user_to )
            y {{$user->name}}
          @endif
        @endforeach
        estado: {{$exchangeInfo->status}}

        <a data-toggle="collapse" href="#collapse{{$exchangeInfo->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
          more
        </a>
        <br>
        <div class="collapse" id="collapse{{$exchangeInfo->id}}">
            <div class="card card-body" style="max-width: 500px;">
              productos en Trueque :<br>
              @foreach($products as $product)
                @foreach($exchangedetails as $details)

                  @if ( $details->exchange_id == $exchangeInfo->id )

                      @if ($product->id == $details->product_id)
                        {{ $product->name  }}<br>
                      @endif


                  @endif
                @endforeach
              @endforeach
            </div>
        </div>
        <br>
      @endforeach

      @foreach($exchangeTo as $exchangeInfo)

        id: {{$exchangeInfo->id}}
        @foreach($users as $user)
          @if ( $user->id == $exchangeInfo->user_from )
            con usuario {{$user->name}}
          @endif

        @endforeach
        @foreach($users as $user)
          @if ( $user->id == $exchangeInfo->user_to )
            y {{$user->name}}
          @endif
        @endforeach
        estado: {{$exchangeInfo->status}}

        <a data-toggle="collapse" href="#collapse{{$exchangeInfo->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
          more
        </a>
        <br>
        <div class="collapse" id="collapse{{$exchangeInfo->id}}">
            <div class="card card-body" style="max-width: 500px;">
              productos en Trueque :<br>
              @foreach($products as $product)
                @foreach($exchangedetails as $details)

                  @if ( $details->exchange_id == $exchangeInfo->id )

                      @if ($product->id == $details->product_id)
                        {{ $product->name  }}<br>
                      @endif


                  @endif
                @endforeach
              @endforeach
            </div>
        </div>
        <br>
      @endforeach
    </div>
    <!-- edit form column -->
      <div class="col-md-9 personal-info hidden"  style=" display:show;" >
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a>
          <i class="fa fa-coffee"></i>
          <strong>Adventencia!</strong> Para cambiar datos se necesita confirmación.
        </div>
        <h3 style="margin-top: 20px; margin-bottom: 20px;">Información Personal</h3>

        <form  action="{{route('profile.update', Auth::user()->id )}}" method="POST" class="form-horizontal" role="form" >
           {{ csrf_field() }}
          {{ method_field('patch') }}
          <div class="form-group">
            <label class="col-lg-3 control-label">Nombre:</label>
            <div class="col-lg-8">
              <input class="form-control"  name="name"  type="text" value="{{ Auth::user()->name }}">
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label"  >Email:</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" name="email" value="{{ Auth::user()->email }}">
              </div>
          </div>

      
          <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
              <div class="col-md-8">
                <input class="form-control" type="password" name="password" value="{{ Auth::user()->password }}">
              </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Confirm password:</label>
              <div class="col-md-8">
                <input class="form-control" type="password"  name="password_confirmation" value="{{ Auth::user()->password }}">
              </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
              <div class="col-md-8">
                <input type="submit" class="btn btn-primary" value="Save Changes">
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
