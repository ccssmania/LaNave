@extends('layouts.main')
@section('title', 'Crear Producto')
@section('content')
<div class="container-white">
	@include('product.form', ['url' => url('/product'), 'method' => 'POST'])
</div>
@endsection