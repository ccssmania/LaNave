@extends("layouts.app")
@section('title', 'Editar los datos de contacto')
@section('description', 'acá se puede editar los datos de contacto de la empresa')
@section('font','id-card')
@section("content")
	@include('contact.form',['url' =>'/profile/contact/edit/'.$contact->id, 'method' => 'POST'])
@endsection