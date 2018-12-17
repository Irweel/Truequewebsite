<div class="form-group">
  {!! Form::label('name', 'Nombre del producto') !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('image', 'Imagen del producto') !!}
  <img id="preview" src="{{asset((isset($products) && $products->image!='')?'uploads/productos/'.$products->image:'images/noimage.jpg')}}"
                                                    height="200px" width="200px"/>
  {{ Form::file('image') }}
</div>
<div class="form-group">
  {!! Form::label('short', 'Descripción breve del producto') !!}
  {!! Form::text('short', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('body', 'Descripción del producto') !!}
  {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::submit('ENVIAR', ['class' => 'btn btn-primary']) !!}
</div>

