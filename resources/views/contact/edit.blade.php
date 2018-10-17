@extends('layouts.main')
@section('title', 'Editar Datos De Contacto')
@section('content')
<div class="container-white">
	@include('contact.form', ['url' => url('/perfil/contact/edit/'.$contact->id), 'method' => 'POST'])
</div>
@endsection