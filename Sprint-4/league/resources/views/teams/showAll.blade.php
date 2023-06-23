@extends('layouts.template')

@section('title', 'All Teams')

@section('content')

    <h1> This is TEAM ShowAll page </h1>

    <ol>
        @foreach ($teams as $team)
            <li>{{$team->name}}
                &emsp;
                {{$team->coach}}
                &emsp;
                {{$team->foundation_date}}
                &emsp; 
                <a href="{{route('teams.show',$team)}}"> View </a> &ensp;
                <a href="{{route('teams.update', $team)}}"> Edit </a> &ensp;
                <a href="{{route('teams.delete', $team)}}"> Delete </a> 
            </li>
        @endforeach
    </ol>

    {{$teams->links()}}

@endsection