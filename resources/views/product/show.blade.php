@extends('layouts.main')

@section('content')
	<div class="container text-center">
		@include("product.product", ["product" => $product])
	</div>
@endsection