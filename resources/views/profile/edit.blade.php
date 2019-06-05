@extends("layouts.app")
@section('title', 'Editar Perfil')
@section('description', 'Modificar datos de usuario')
@section('font','user')
@section("content")
	@include('profile.form',['url' =>'/profile/edit/'.$user->id, 'method' => 'POST'])
@endsection