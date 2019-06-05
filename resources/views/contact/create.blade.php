@extends("layouts.app")
@section('title', 'Agregar los datos de contacto')
@section('description', 'acá se puede agregar los datos de contacto de la empresa')
@section('font','id-card')
@section("content")
	@include('contact.form',['url' =>'/profile/contact/create/', 'method' => 'POST'])
@endsection