@extends('layouts.app')
@section('content')
<h1>Your Applications</h1>

@if(count($applications)>0)
    @foreach ($applications as $application)
        <h3><a href="/posts/{{$application->post_id}}">{{$application->post->sport_name}}</a></h3>
        <p>{{$application->post-> body}}</p>
        <p>Status: {{$application->status}}</p>
        <p>Applied at: {{$application->created_at}}</p>
    <br>
    @endforeach
    @else
    <p>You have no posts</p>
@endif


@endsection