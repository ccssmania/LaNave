<div class="container">
    <div class=" card">
        <table class="table">
            <tr>
                <th height="200" width="200">
                    <img class="img-circle img-responsive img-center"  src="{{url('/images/small/user_'.$user->id.'.webp')}}" onerror="this.src='{{url("/images/perfil.png")}}'">
                </th>
                <th>
                	<div class="col-md-6">	
                        <p><em>{{$user->name}}</em></p>
                        <p>{{$user->email}}</p>
                        
                	</div>
                </th>
                <th>
                	<div class="col-md-6 text-rigth">
                		<a href="{{url('/profile/edit/'.$user->id)}}" title="Editar Perfil"><i class="fa fa-edit fa-lg"></i></a>
                	</div>
                </th>
            </tr>
        </table>
    </div>
</div>    