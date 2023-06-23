@extends('layouts.template')

@section('title', 'Create Team')

@section('content')

    <h1> This is TEAM Create page </h1>
    <br>
    <form action="{{route('teams.store')}}" method="POST">
        {{-- directiva token --}}
        @csrf

        <label>
            Team name:
            <input type="text" name="name">
        </label>
        <br>        
        <label>
            Coach:
            <input type="text" name="coach">
        </label>
        <br>
        <label>
            Foundation date:
            <input type="date" name="date">
        </label>
        <br><br>
        
        <button type="submit">Create Team</button>
        <input type="button" value="Cancel" onclick="window.location='{{route('teams.index')}}'"/>

    </form>

@endsection
