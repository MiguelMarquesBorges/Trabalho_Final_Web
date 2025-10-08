@extends('layouts.main_layout')

@section('title', 'Home - Copa do Rio Doce')

@section('content')
    @include('partials.topbar')
    @include('partials.navbar')
    
    @if(session('sucess'))
        <p>{{session('sucess')}}</p>
    @endif

@endsection