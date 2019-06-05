@extends("layouts.app")
@section('title', 'Crear Producto')
@section('description', 'Este es el formulario para crear un nuevo producto')
@section('font','list')
@section("content")
<div class="container-white">
	@include('product.form', ['url' => url('/product'), 'method' => 'POST'])
</div>
@endsection