<form action="{{url('/task/'.$task->id.'/delete')}}" method="POST">
	@csrf
	<button class="btn btn-link" type="submit" style="color: red;">Eliminar</button>
</form>