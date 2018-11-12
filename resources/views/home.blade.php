@extends('layouts.main')

@section('title', 'productos')

@section('content')
<div  id="app">
    @if (Auth::guest())
    @include('public.home')
    @else

    <script>
	 window.location.href = '{{url("/tasks")}}';
	</script>
        
    @endif
</div>
@endsection
