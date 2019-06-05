@extends("layouts.app")
@section('title', 'Agregar Tarea')
@section('description', 'Este es el formulario para agregar una nueva tarea')
@section('font','tasks')
@section("content")
<div class="container-white">
	@include('tasks.form', ['url' => url('/tasks'), 'method' => 'POST'])
</div>
@endsection