@extends('layouts.main')
@section('content')
<div class="container">

	<!-- Page Heading/Breadcrumbs -->
	<h1 class="mt-4 mb-3">Contacto
	</h1>

	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="{{url('/')}}">Home</a>
		</li>
		<li class="breadcrumb-item active">Contacto</li>
	</ol>

	<!-- Content Row -->
	<div class="row">
		<!-- Map Column -->
		<div class="col-lg-8 mb-4">
			<!-- Embedded Google Map -->
			<iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=56.506174,79.013672&amp;t=m&amp;z=4&amp;output=embed"></iframe>
		</div>
		<!-- Contact Details Column -->
		<div class="col-lg-4 mb-4">
			<h3>Detalles de contacto</h3>
			<p>
				{{$contact->address}}
			</p>
			<p>
				<abbr title="Teléfono">P</abbr>: {{$contact->number}}
			</p>
			<p>
				<abbr title="Email">E</abbr>:
				<a href="mailto:{{$contact->name}}">{{$contact->name}}
				</a>
			</p>
		</div>
	</div>
	<!-- /.row -->

	<!-- Contact Form -->
	<!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
	<div class="row">
		<div class="col-lg-8 mb-4">
			<h3>Envíanos un mensaje</h3>
			<form name="sentMessage" id="contactForm" action="/contactus">
				<div class="control-group form-group">
					<div class="controls">
						<label>Nombre Completo</label>
						<input type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name.">
						<p class="help-block"></p>
					</div>
				</div>
				<div class="control-group form-group">
					<div class="controls">
						<label>Número célular:</label>
						<input type="tel" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number.">
					</div>
				</div>
				<div class="control-group form-group">
					<div class="controls">
						<label>Email:</label>
						<input type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address.">
					</div>
				</div>
				<div class="control-group form-group">
					<div class="controls">
						<label>Mensaje:</label>
						<textarea rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
					</div>
				</div>
				<div id="success"></div>
				<!-- For success/fail messages -->
				<button type="submit" class="btn btn-primary" id="sendMessageButton">Send Message</button>
			</form>
		</div>

	</div>
	<!-- /.row -->

</div>
@endsection