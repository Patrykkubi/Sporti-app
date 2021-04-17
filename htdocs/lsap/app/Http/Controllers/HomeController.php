<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('dashboard.Home')->with('posts', $user->posts);
    }

    public function showPostMembers($id){
        $post = Post::find($id);

        $members= DB::table('post_member')
                            ->join('posts', 'post_member.post_id','posts.id')
                            ->where('post_member.post_id','=',$post->id)
                            ->join('users', 'post_member.member_id','users.id')
                            ->select('post_member.*','users.*')
                            ->get();
        

        return view('dashboard.postMembers')->with('members',$members);

    }


}
