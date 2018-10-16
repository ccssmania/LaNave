<div class=" big-margin-top">
	<div class="row">
		<div class="col-md-12 ">
			<div class="panel panel-info">
				<div class="panel-heading text-black"><strong><h4>{{$product->name}}</h4></strong> </div>

				<div class="panel-body">

					<div class="col-md-6">
						<img class="card-img-top " style="margin-top: 15px; " src="{{url('/images/large/p_'.$product->id.'.jpg')}}" onerror="this.src='{{url("products/images/carwash.png")}}'" alt="Card image cap">
					</div>

					<div style="margin-top: 30px;" class="col-md-3 ">
						
						<div class="">
							<h3 class="break-word"><strong>Description</strong></h3>
							<p class="break-word">{!!$product->description!!}</p>
							
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>