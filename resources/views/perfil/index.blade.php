@extends("layouts.main")
@section("content")
<div class=" little-margin-top">
	<h1>Perfil</h1>
	        <table class="table">
	            <tr>
	                <th height="200" width="200">
	                    <img class="img-circle img-responsive img-center"  src="{{url('/images/'.$user->id.'.jpg')}}" onerror="this.src='{{url("/images/perfil.png")}}'">
	                </th>
	                <th>
	                	<div class="col-md-6">	
		                    <p><em>{{$user->name}}</em></p>
		                    <p>{{$user->email}}</p>
		                    
	                	</div>
	                	<div class="col-md-6 text-left">
	                		<a href="{{url('/perfil/edit/'.$user->id)}}"><i class="fa fa-edit"></i></a>
	                	</div>
	                </th>
	            </tr>
	       
	            <tr><th></th><th></th></tr>
	        </table>

</div>
@endsection