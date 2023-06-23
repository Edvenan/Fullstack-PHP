@extends('layouts.template')

@section('title', 'All Games')

@section('content')

    <h1> This is GAME ShowAll page </h1>

    <ol>
        @foreach ($games as $game)
            
            {{-- replace teams id by teams name --}}
            @foreach ($teams as $team)
                @if ($team->id == $game->team_1)
                    <?php 
                    $name_team1 = $team->name;
                    ?>
                @elseif ($team->id == $game->team_2)
                    <?php
                    $name_team2 = $team->name;
                    ?>
                @else 
                    @continue
                @endif
            @endforeach 

            <li>{{$name_team1}} - {{$name_team2}}
                &emsp;
                {{date('d-m-Y',strtotime($game->date))}}
                &emsp;
                ({{$game->score_team_1}}) - ({{$game->score_team_2}})
                &emsp;
                <a href="{{route('games.show',$game)}}"> View </a> 
                &nbsp;
                <a href="{{route('games.update', $game)}}"> Edit </a> 
                &nbsp;
                <a href="{{route('games.delete', $game)}}"> Delete </a> 
            </li>
        @endforeach
    </ol>

    {{$games->links()}}

@endsection
