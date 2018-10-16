@extends('layouts.main')

@section('title', 'productos')

@section('content')
<div  id="app">
    @if (Auth::guest())
    @include('public.home')
    @else
        @php  redirect('/user');@endphp
    @endif
</div>
@endsection
