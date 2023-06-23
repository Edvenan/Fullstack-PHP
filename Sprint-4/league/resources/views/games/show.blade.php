@extends('layouts.template')

@section('title', 'Game: '.$game->team_1.' vs '.$game->team_2 )

@section('content')

    <h1> This is GAME Show page: </h1>
    <br>
    <a href="{{route('games.index')}}"> Back </a> 
    <a href="{{route('games.update', $game)}}"> Edit </a> 
    <a href="{{route('games.delete', $game)}}"> Delete </a> 
    <ul>
        <li><strong>Game : </strong>{{$name_team_1}} ({{$game->score_team_1}}) - {{$name_team_2}} ({{$game->score_team_2}})</li>
        <li><strong>Date: </strong>{{date('d-m-Y',strtotime($game->date))}} </li>
        <li><strong>Score: </strong>{{$game->score_team_1}} - {{$game->score_team_2}} </li>
    </ul>

@endsection
