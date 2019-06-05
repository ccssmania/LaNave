@extends("layouts.app")
@section('title', 'Editar Trabajador')
@section('description', 'Este es el formulario para editar un trabajador')
@section('font','user')
@section("content")
	@include('employe.form',['url' =>'/profile/employe/edit/'.$employe->id, 'method' => 'POST'])
@endsection