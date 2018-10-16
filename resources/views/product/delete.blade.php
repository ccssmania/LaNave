<form class="inline_block" action="{{url('/product/delete/'.$product->id)}}" method="POST">
	{{ csrf_field() }}
	<input type="submit" class="btn btn-link red-text no-padding no-margin no-transform" value="Eliminar">
</form>