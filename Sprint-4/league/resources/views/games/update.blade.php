@extends('layouts.template')

@section('title', 'Update Game: '.$game)

@section('content')

    <h1> This is GAME Update page: </h1>
    <br>
    <p><strong>Game to be updated:</strong> <br> {{$game}}  </p>
    <br>
    <form action="{{route('games.store')}}" method="POST">
        {{-- directiva token --}}
        @csrf

        {{-- edit Local team --}}
        <strong>
        <label for="team_1"> &nbsp; Local Team </label> &emsp;&emsp;&emsp; 
        <label for="team_2"> &nbsp; Visitor Team </label>  &emsp;&emsp;
        <label for="game_date"> &nbsp; Game date</label> &emsp;&emsp;&emsp;
        </strong>
        <br>
        <select name="team_1" id="team_1"  onchange="updateSecondSelectOptions()">
            <option selected value="{{$name_team_1}}">{{$name_team_1}}</option>
            @foreach ($teams as $team)
                <option value="{{$team->name}}">{{$team->name}}</option>                 
            @endforeach
        </select>
        &nbsp; - &nbsp;

        {{-- edit Visitor team --}}
        <select name="team_2" id="team_2">
            <option selected value="{{$name_team_2}}">{{$name_team_2}}</option>
            @foreach ($teams as $team)
                <option value="{{$team->name}}">{{$team->name}}</option>                 
            @endforeach
        </select>
        &emsp;

        {{-- script to Add options to the second select except for the selected value from the first select --}}
        <script>
            function updateSecondSelectOptions() {
                // Get the selected value from the first select
                var firstSelect = document.getElementById("team_1");
                var selectedValue = firstSelect.value;
        
                // Get the second select element
                var secondSelect = document.getElementById("team_2");
        
                // Clear existing options
                secondSelect.innerHTML = "";
        
                // Get all options from the original list
                var options = {!! json_encode($teams->pluck('name')) !!};
        
                // Add options to the second select except for the selected value from the first select
                for (var i = 0; i < options.length; i++) {
                    if (options[i] !== selectedValue) {
                        var option = document.createElement("option");
                        option.value = options[i];
                        option.textContent = options[i];
                        secondSelect.appendChild(option);
                    }
                }

            }
        </script>

        {{-- edit Game Date  --}}
        <input type="date" id="game_date" name="date" value="{{$game->date}}">
        <br><br>

        <strong>
        <label for="score_team_1"> &nbsp; Score Local</label> &emsp;&emsp;&emsp;
        <label for="score_team_2"> &nbsp; Score Visitor</label> &emsp;&emsp;&emsp;
        </strong>
        <br>&ensp;
        
        <input type="number" id="score_team_1" name="score_team_1" min="0" max="100" value="{{$game->score_team_1}}">
        &emsp;&emsp;&emsp;&emsp;
        <input type="number" id="score_team_2" name="score_team_2" min="0" max="100" value="{{$game->score_team_2}}">
        <br><br>

        {{-- submit button  --}}
        <button type="submit">Update Game</button>
    </form>
@endsection
