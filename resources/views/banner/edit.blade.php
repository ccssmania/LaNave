@extends("layouts.app")
@section('title', 'Editar una imagen de banner')
@section('description', 'acá se puede editar o cambiar una imagen de la pagina principal')
@section('font','image')
@section("content")
	@include('banner.form',['url' =>'/profile/banner/edit/'.$banner->id, 'method' => 'POST'])
@endsection