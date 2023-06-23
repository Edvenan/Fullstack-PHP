@extends('layouts.template')

@section('title', 'Team: '.$team)

@section('content')

    <h1> This is TEAM Show page: </h1>
    <br>
    <a href="{{route('teams.index')}}"> Back </a> 
    <a href="{{route('teams.update', $team)}}"> Edit </a> 
    <a href="{{route('teams.delete', $team)}}"> Delete </a> 
    <ul>
        <li><strong>Name : </strong>{{$team->name}}</li>
        <li><strong>Coach: </strong>{{$team->coach}} </li>
        <li><strong>Foundation date: </strong>{{date('d-m-Y',strtotime($team->foundation_date))}} </li>
        <li><strong>Games: </strong>
            @foreach ($games as $game)
                @if ($team->id != $game->team_1 && $team->id != $game->team_2)
                    @continue;    
                @endif
                <ul>
                    <li>{{$game->team_1}} - {{$game->team_2}} &emsp; [{{$game->score_team_1}}]-[{{$game->score_team_2}}] &emsp; {{date('d-m-Y',strtotime($game->date))}}</li>
                </ul>               
            @endforeach
        
        
        </li>

    </ul>
@endsection
