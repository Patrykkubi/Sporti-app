@extends('layouts.app')
@section('content')
<a href="/posts" class='btn btn-default bg-light'> Go Back</a>

  
    <h1>{{$post->title}}</h1>
    <div class="well">
        <h3>{{$post->sport_name}}</h3>
        <h5>{!!$post->body!!}</h5>
        <p>Województwo: {{$post->provinance}}</p>
        <p>Miasto: {{$post->city}}</p>
        <p>Ulica: {{$post->street}}</p>
        <p>Data spotknia: {{$post->date_of_the_meeting}}</p>
        <p>Godzina spotkania: {{$post->time_of_the_meeting}}</p>
        <p>Player level: {{$post->player_level}}</p>
        <p>Opłata wstępu: {{$post->cost_of_meeting}} zł</p>
        <p>Gracze: {{$post->current_player_count}}/{{$post->max_player_count}}</p>
        
    </div>
    <hr>
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    <hr>
    @if (!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-default bg-light">Edit</a>
            {!!Form::open(['action'=>['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST', 'class'=> 'float-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
        @if(Auth::user()->id !== $post->user_id)
        {!!Form::open(['action' => ['App\Http\Controllers\ApplicationController@apply', $post->id], 'method' => 'GET']) !!}
        {{Form::submit('Join', ['class' => 'btn btn-primary'])}}
        {!!Form::close() !!}
        @endif
    @endif
@endsection