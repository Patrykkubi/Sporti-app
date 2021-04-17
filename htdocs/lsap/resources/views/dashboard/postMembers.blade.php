@extends('layouts.app')
@section('content')
<h1>Team Members</h1>
@if(count($members)>0)
    @foreach ($members as $member)
    
        <h1>{{$member->name}}</h1>
        
    
    @endforeach

@else
<p>No current members</p>
@endif
@endsection