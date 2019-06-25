@extends('layouts.app')
@section('content')
	<div class="container" style="margin-top: 50px;">
		<ul class="list-unstyled">
			@foreach($products as $product)
				<div class="row">
					<li class="media">
					    <img class="mr-3" src="{{url('/images/product_'.$product->id.'.webp')}}" alt="Generic placeholder image">
					    <div class="media-body">
					    	<h5 class="mt-0 mb-1">List-based media object</h5>
					     	 Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
					  	</div>
					</li>
				</div>
			@endforeach
		</ul>
	</div>
@endsection