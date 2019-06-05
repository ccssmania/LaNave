@extends("layouts.app")
@section('title', 'Editar Producto')
@section('description', 'Este es el formulario para editar un producto')
@section('font','list')
@section("content")
<div class="container-white">
	@include('product.form', ['url' => url('/product/edit/'.$product->id), 'method' => 'POST'])
</div>
@endsection