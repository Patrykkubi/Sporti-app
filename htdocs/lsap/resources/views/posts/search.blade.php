@extends('layouts.app')
@section('content')
<h1>Search for post</h1>
<button onclick="myFunction()">Search</button>

<div id="myDiv" style="display:none">

{!!Form::open(['action' => 'App\Http\Controllers\PostsController@search', 'method' => 'GET']) !!}
<div class='form-group'>
    {{Form::label('sport_name', 'Sport')}}
    {{Form::select('sport_name', array(''=>'All','volleyball' => 'Volleyball', 'basketball' => 'Basketball', 'football'=>'Football'),null, ['class' => 'form-control'])}}
</div>
<div class='form-group'>
    {{Form::label('player_level', 'Player Level')}}
    {{Form::select('player_level', array(''=>'All','beginner' => 'Beginner', 'intermediate' => 'Intermediate', 'advanced'=>'Advanced'),null, ['class' => 'form-control'])}}
</div>
<div class='form-group'>
    {{Form::label('provinance', 'Provinance')}}
    {{Form::text('provinance', '', ['class' => 'form-control', 'placeholder'=>'Provinance'])}}
</div>
<div class='form-group'>
    {{Form::label('max_player_count', 'Number of players')}}
    {{Form::number('max_player_count', '', ['class' => 'form-control', 'placeholder'=>'number of players'])}}
</div>
<div class='form-group'>
    {{Form::label('city', 'City')}}
    {{Form::text('city', '', ['class' => 'form-control', 'placeholder'=>'City'])}}
</div>

<div class='form-group'>
    {{Form::label('street', 'Street')}}
    {{Form::text('street', '', ['class' => 'form-control', 'placeholder'=>'Street'])}}
</div>

<div class='d-flex flex-row'>
    <div class="form-group">
        {{Form::label('date_of_the_meeting', 'Date of the meeting')}}
        {{ Form::date('date_of_the_meeting','', ['class' => 'form-control']) }}
    </div>
    
    <div class="form-group">
        {{Form::label('date_of_the_meeting_end', '')}}
        {{ Form::date('date_of_the_meeting_end','', ['class' => 'form-control']) }}
    </div>
</div>

<div class='d-flex flex-row'>
    <div class="form-group">
        {{Form::label('time_of_the_meeting', 'Time of the meeting')}}
        {{Form::time('time_of_the_meeting','', ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{Form::label('time_of_the_meeting_end', '')}}
        {{Form::time('time_of_the_meeting_end','', ['class' => 'form-control']) }}
    </div>
</div>

<div class='form-group'>
    {{Form::label('cost_of_meeting', 'Entry cost')}}
     {{Form::number('cost_of_meeting', '', ['class' => 'form-control', 'placeholder'=>'cost'])}}
</div>


{{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}
</div>


    <h1>Post wyszukany</h1>
    
    @if (count($posts)>0)
        @foreach ($posts as $post)
            <div class="well bg-light">
                <h3><a href="/posts/{{$post->id}}">{{$post->sport_name}}</a></h3>
                <p>{{$post->title}}</p>
                <p>Województwo: {{$post->provinance}}</p>
                <p>Miasto: {{$post->city}}</p>
                <p>Ulica: {{$post->street}}</p>
                <p>Date of meeting: {{$post->date_of_the_meeting}}</p>
                <p>Time of the meeting: {{$post->time_of_the_meeting}}</p>
                <p>Player level: {{$post->player_level}}</p>
                <p>Opłata wstępu: {{$post->cost_of_meeting}} zł</p>
                <p>Gracze: {{$post->current_player_count}}/{{$post->max_player_count}}</p>
                <small>written on {{$post->created_at}} by {{$post->user->name}}</small>
            </div>
        @endforeach
         {{$posts->links()}}
    @else 
     <p>No posts found</p>
    @endif
    <script>
        function myFunction() {
      var x = document.getElementById("myDiv");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {    
        x.style.display = "none";
      }
    }
    </script>
@endsection