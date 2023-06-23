@extends('layouts.template')

@section('title', 'Teams')

@section('content')

    <h1> This is TEAM Index page </h1>
    <br>
    <br>
    <a href="{{route('home')}}"> Home </a> 
    <br>
    <a href="{{route('teams.create')}}"> Create new Team </a> 
    <br>
    <a href="{{route('teams.showAll')}}"> View all Teams </a> 

@endsection
