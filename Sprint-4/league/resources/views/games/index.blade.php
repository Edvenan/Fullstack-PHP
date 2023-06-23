@extends('layouts.template')

@section('title', 'Games')

@section('content')

    <h1> This is GAME Index page </h1>
    <br>
    <br>
    <a href="{{route('home')}}"> Home </a> 
    <br>
    <a href="{{route('games.create')}}"> Create new Game </a> 
    <br>
    <a href="{{route('games.showAll')}}"> View all Games </a> 

@endsection
