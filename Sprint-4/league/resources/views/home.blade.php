@extends('layouts.template')

@section('title', 'The League!')

@section('content')

    <h1> Home Page: Welcome to the League!</h1> 
    <br>
    <br>
    <a href="{{route('teams.index')}}"> Teams Management </a> 
    <br>
    <a href="{{route('games.index')}}"> Games Management</a> 

@endsection