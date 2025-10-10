@extends('layouts.main_layout')

@section('title', 'Home - Copa do Rio Doce')

@section('content')
    @include('partials.topbar')
    @include('partials.navbar')
    
    @if(session('success'))
        <p>{{session('success')}}</p>
    @endif

@endsection