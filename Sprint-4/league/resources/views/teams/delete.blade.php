@extends('layouts.template')

@section('title', 'Delete Team')

@section('content')
    <h1> This is Team Delete page:  </h1>
    <br>
    <p><strong>Team to be deleted:</strong> 
        <br>
    {{$team}}
    </p>
@endsection
