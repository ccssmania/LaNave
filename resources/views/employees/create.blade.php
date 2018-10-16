@extends('layouts.main')
@section('title', 'Crear Trabajador')
@section('content')
<div class="container-white">
	@include('employees.form', ['url' => url('/perfil/employe/create'), 'user' => $employe, 'method' => 'POST'])
</div>
@endsection