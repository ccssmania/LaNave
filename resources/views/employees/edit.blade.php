@extends('layouts.main')
@section('title', 'Editar Trabajador')
@section('content')
<div class="container-white">
	@include('employees.form', ['url' => url('/perfil/employe/edit/'.$employe->id), 'user' => $employe, 'method' => 'POST'])
</div>
@endsection