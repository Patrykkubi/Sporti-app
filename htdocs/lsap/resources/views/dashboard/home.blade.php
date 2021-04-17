@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/posts/create" class="btn btn-primary">Create Post</a>
                    <h3>Your Blog Posts</h3>
                    @if (count($posts)>0)
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th>Created at</th>
                            <th>Players</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach ($posts as $post)
                        <tr>
                            <td><a href="/posts/{{$post->id}}">{{$post->sport_name}}</a></td>
                            <td>{{$post->created_at}}</td>
                            
                            <td><a href="/dashboard/post-members/{{$post->id}}">{{$post->current_player_count}}/{{$post->max_player_count}}</a></td>
                            @if ($post->date_of_the_meeting == Carbon\Carbon::today()->toDateString())
                            <td><a href="/post-members/{{$post->id}}/attendance" class="btn btn-primary">Attendance</a></td>
                            @else
                            <td></td>
                            @endif
                            <td><a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a></td>
                            
                            <td>
                                {!!Form::open(['action'=>['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST', 'class'=> 'float-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                            {!!Form::close()!!}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    @else
                    <p>You have no posts</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
