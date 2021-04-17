@extends('layouts.app')
@section('content')
    <h1>Edit Post</h1>
    {!!Form::open(['action' => ['App\Http\Controllers\PostsController@update', $post->id], 'method' => 'POST']) !!}
    
    <div class='form-group'>
        {{Form::label('sport_name', 'Sport')}}
        {{Form::select('sport_name', array('volleyball' => 'Volleyball', 'basketball' => 'Basketball', 'football'=>'Football'),$post->sport_name, ['class' => 'form-control'])}}
    </div>
    <div class='form-group'>
        {{Form::label('player_level', 'Player Level')}}
        {{Form::select('player_level', array('beginner' => 'Beginner', 'intermediate' => 'Intermediate', 'advanced'=>'Advanced'),$post->player_level, ['class' => 'form-control'])}}
    </div>
    <div class='form-group'>
        {{Form::label('provinance', 'Provinance')}}
        {{Form::text('provinance', $post->provinance, ['class' => 'form-control', 'placeholder'=>'Provinance'])}}
    </div>
    <div class='form-group'>
        {{Form::label('max_player_count', 'Number of players')}}
        {{Form::number('max_player_count', $post->max_player_count, ['class' => 'form-control', 'placeholder'=>'number of players'])}}
    </div>
    <div class='form-group'>
        {{Form::label('city', 'City')}}
        {{Form::text('city', $post->city, ['class' => 'form-control', 'placeholder'=>'City'])}}
    </div>
    <div class='form-group'>
        {{Form::label('street', 'Street')}}
        {{Form::text('street', $post->street, ['class' => 'form-control', 'placeholder'=>'Street'])}}
    </div>
    <div class="form-group">
        {{Form::label('date_of_the_meeting', 'Date of the meeting')}}
        {{Form::date('date_of_the_meeting', $post->date_of_the_meeting , ['class' => 'form-control']) }}
    </div>
    <div class='form-group'>
        {{Form::label('time_of_the_meeting', 'Time of the meeting')}}
        {{Form::time('time_of_the_meeting', $post->time_of_the_meeting , ['class' => 'form-control']) }}
    </div>
    <div class='form-group'>
        {{Form::label('cost_of_meeting', 'Entry cost')}}
        {{Form::number('cost_of_meeting', $post->cost_of_meeting, ['class' => 'form-control', 'placeholder'=>'cost'])}}
    </div>
    <div class='form-group'>
        {{Form::label('body', 'Description')}}
        {{Form::textarea('body', $post->body, ['class' => 'form-control', 'placeholder'=>'description'])}}
    </div>
   
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection