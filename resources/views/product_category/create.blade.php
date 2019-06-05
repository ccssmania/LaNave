@extends("layouts.app")
@section('title', 'Crear Categoría')
@section('description', 'Este es el formulario para crear una nueva categoría')
@section('font','list')
@section("content")
<div class="container-white">
	@include('product_category.form', ['url' => url('/product_category'), 'method' => 'POST'])
</div>
@endsection