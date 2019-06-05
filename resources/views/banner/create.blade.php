@extends("layouts.app")
@section('title', 'Agregar una nueva imagen de banner')
@section('description', 'acá se puede agregar una nueva imagen a la pagina principal')
@section('font','image')
@section("content")
	@include('banner.form',['url' =>'/profile/banner/create/', 'method' => 'POST'])
@endsection