@extends('layouts.template')

@section('title', 'Delete Game')

@section('content')

    <h1> This is GAME Delete page:  </h1>
    <br>
    <p><strong>Game to be deleted:</strong> 
        <br>
       {{$game}}
    </p>
@endsection
