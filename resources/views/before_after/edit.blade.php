@extends("layouts.app")
@section('title', 'Editar las imágenes de Antes y Después')
@section('description', 'acá se puede editar o cambiar una imagen de antes o después de la pagina principal')
@section('font','image')
@section("content")
	@include('before_after.form',['url' =>'/profile/before_after/edit/'.$beforeAfter->id, 'method' => 'POST'])
@endsection