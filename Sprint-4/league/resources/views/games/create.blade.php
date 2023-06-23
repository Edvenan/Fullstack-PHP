@extends('layouts.template')

@section('title', 'Create Game')

@section('content')

    <h1> This is GAME Create page </h1>
    <br>
    <form action="{{route('games.store')}}" method="POST">
        {{-- directiva token --}}
        @csrf

        <label for="team_1"> Local Team: </label>
        <select name="team_1" id="team_1" required onchange="updateSecondSelectOptions()">
            <option value="">Select Local team</option>
            @foreach ($teams as $team)
            <option value="{{$team->name}}">{{$team->name}}</option>                 
            @endforeach
        </select>
        <br>        

        <label for="team_2"> Visitor Team: </label>
        <select name="team_2" id="team_2" required >
            <option value="">Select Visitor team</option>
        </select>
        <br>

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

        <label>
            Game date:
            <input type="date" name="date" required>
        </label>
        <br><br>
        <button type="submit">Create Game</button>
        <input type="button" value="Cancel" onclick="window.location='{{route('games.index')}}'"/>
    </form>
@endsection