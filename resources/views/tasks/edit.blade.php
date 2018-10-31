@extends('layouts.main')
@section('title', 'Agregar tarea')
@section('content')
<div class="container-white">
	@include('tasks.form', ['url' => url('/tasks/'.$task->id), 'method' => 'PUT'])
</div>
@endsection