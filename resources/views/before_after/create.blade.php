@extends("layouts.app")
@section('title', 'Agregar una nueva imagen de Antes y Después')
@section('description', 'acá se puede agregar una nueva imagen a la pagina principal')
@section('font','image')
@section("content")
	@include('before_after.form',['url' =>'/profile/before_after/create/', 'method' => 'POST'])
@endsection