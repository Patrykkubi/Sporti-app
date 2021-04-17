<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;
use DateTime;
class PostsController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except'=> ['index', 'show','search']] );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //$posts = Post::all();
        //$post= Post::where('title','Post Two')->get();

        $posts = Post::orderBy('created_at','desc')->paginate(10);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            
            'body' => 'required',
            'sport_name'=> 'required',
            'provinance'=> 'required',
            'city'=> 'required',
            'street'=> 'required',
            'cost_of_meeting'=> 'required',
            'player_level'=> 'required',
            'max_player_count' =>'required',
            'date_of_the_meeting' => 'required',
            'time_of_the_meeting' => 'required'
            
        ]);

        //create Post
        $post = new Post;
        $post->body = $request->input('body');
        $post->sport_name = $request->input('sport_name');
        $post->provinance = $request->input('provinance');
        $post->city = $request->input('city');
        $post->street = $request->input('street');
        $post->cost_of_meeting = $request->input('cost_of_meeting');
        $post->player_level = $request->input('player_level');
        $post->max_player_count = $request->input('max_player_count');
        $post->date_of_the_meeting = $request->input('date_of_the_meeting');
        $post->time_of_the_meeting = $request->input('time_of_the_meeting');
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        //check for correct user

        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'body' => 'required',
            'sport_name'=> 'required',
            'provinance'=> 'required',
            'city'=> 'required',
            'street'=> 'required',
            'cost_of_meeting'=> 'required',
            'player_level'=> 'required',
            'max_player_count' =>'required',
            'date_of_the_meeting' => 'required',
            'time_of_the_meeting' => 'required'
        ]);

        //find Post
        $post = Post::find($id);
        
        //check for correct user

        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }
        
        $post->body = $request->input('body');
        $post->sport_name = $request->input('sport_name');
        $post->provinance = $request->input('provinance');
        $post->city = $request->input('city');
        $post->street = $request->input('street');
        $post->cost_of_meeting = $request->input('cost_of_meeting');
        $post->player_level = $request->input('player_level');
        $post->max_player_count  = $request->input('max_player_count');
        $post->date_of_the_meeting = $request->input('date_of_the_meeting');
        $post->time_of_the_meeting = $request->input('time_of_the_meeting');
        $post->save();

        return redirect('/posts')->with('success', 'Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        //check for correct user

        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        $post->delete();
        return redirect('/posts')->with('success', 'Post removed');
    }

    public function search(Request $request){
    
        $posts = post::
        when($request->input('sport_name'), function($query) use ($request){
            $query->where('sport_name', 'LIKE', '%'.$request->input('sport_name').'%');
        })
        ->when($request->input('provinance'), function($query) use ($request){
            $query->where('provinance', 'LIKE', '%'.$request->input('provinance').'%');
        })
        ->when($request->input('city'), function($query) use ($request){
            $query->where('city', 'LIKE', '%'.$request->input('city').'%');
        })
        ->when($request->input('street'), function($query) use ($request){
            $query->where('street', 'LIKE', '%'.$request->input('street').'%');
        })
        ->when($request->input('cost_of_meeting'), function($query) use ($request){
            $query->where('cost_of_meeting', '>=', $request->input('cost_of_meeting'));
        })
        ->when($request->input('player_level'), function($query) use ($request){
            $query->where('player_level', 'LIKE', '%'.$request->input('player_level').'%');
        })
        ->when($request->input('cost_of_meeting'), function($query) use ($request){
            $query->where('cost_of_meeting', '>=', $request->input('cost_of_meeting'));
        })
        ->when($request->input('max_player_count'), function($query) use ($request){
            $query->where('max_player_count', '>=', $request->input('max_player_count'));
        })
        ->when($request->input('date_of_the_meeting'), function($query) use ($request){
            $query->where('date_of_the_meeting', '>=',$request->input('date_of_the_meeting'));
        })
        ->when($request->input('date_of_the_meeting_end'), function($query) use ($request){
            $query->where('date_of_the_meeting', '<=',$request->input('date_of_the_meeting_end'));
        })
        ->when($request->input('time_of_the_meeting'), function($query) use ($request){
            $query->where('time_of_the_meeting', '>=',$request->input('time_of_the_meeting'));
        })
        ->when($request->input('time_of_the_meeting_end'), function($query) use ($request){
            $query->where('time_of_the_meeting', '<=',$request->input('time_of_the_meeting_end'));
        })
        ->paginate(10);

        return view('posts.search')->with('posts',$posts);
    }
}
