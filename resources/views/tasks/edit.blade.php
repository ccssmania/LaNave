@extends('layouts.app')
@section('title','Editar')
@section('description','Formulario para editar una tarea')
@section('font','edit')
@section('content')
<div class="container-white">
	@include('tasks.form', ['url' => url('/tasks/'.$task->id.'/update'), 'method' => 'POST'])
</div>
@endsection