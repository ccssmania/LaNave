@extends('layouts.main')

@section('title', 'productos')

@section('content')
<div  id="app">
    @if (Auth::guest())
    @include('public.home')
    @else

        <script>
	// your "Imaginary javascript"
	 window.location.href = '{{url("/tasks")}}';
	</script>
        
    @endif
</div>
@endsection
