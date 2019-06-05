@extends("layouts.app")
@section('title', 'Crear Trabajador')
@section('description', 'Este es el formulario para crear un trabajador')
@section('font','user')
@section("content")
	@include('employe.form',['url' =>'/profile/employe/create/', 'method' => 'POST'])
@endsection