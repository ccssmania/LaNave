@extends('layouts.main')
@section('title', 'Editar Producto')
@section('content')
<div class="container-white">
	@include('perfil.form', ['url' => url('/perfil/edit/'.$user->id), 'method' => 'POST'])
</div>
@endsection