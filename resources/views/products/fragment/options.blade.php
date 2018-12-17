<div class="col-4 col-sm-4 col-md-4 text-right align-middle">
  <a href="{{ route('products.edit', $product->id)}}">
    <button class="btn btn-info">editar</button>
  </a>
</div>
<div class="col-4 col-sm-2 col-md-2 text-right">
  <form action="{{ route('products.destroy', $product->id) }}" method="POST">
  {{ csrf_field() }}
  {{ method_field('DELETE') }}
  <button class="btn btn-xs btn-default">Borrar</button>
  </form>
</div>
