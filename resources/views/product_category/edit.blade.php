@extends("layouts.app")
@section('title', 'Editar Categoría')
@section('description', 'Este es el formulario para editar una categoría')
@section('font','list')
@section("content")
<div class="container-white">
	@include('product_category.form', ['url' => url('/product_category/edit/'.$product_category->id), 'method' => 'POST'])
</div>
@endsection