@extends('layouts.main')
@section('title', 'Editar Producto')
@section('content')
<div class="container-white">
	@include('product.form', ['url' => url('/product/edit/'.$product->id), 'method' => 'POST'])
</div>
@endsection