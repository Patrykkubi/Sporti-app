<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Attendance;
use Illuminate\Support\Facades\DB;


class AttendanceController extends Controller
{
    public function index($id){
       
        $post = Post::find($id);

        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        $members= DB::table('post_member')
                            ->join('posts', 'post_member.post_id','posts.id')
                            ->where('post_member.post_id','=',$post->id)
                            ->join('users', 'post_member.member_id','users.id')
                            ->select('post_member.*','users.*','posts.user_id')
                            ->get();
        
        return view('attendance.userAttendance')->with('members',$members);
    }

    public function attendancePresent(Request $request){
        
        $post=Post::where('id',$request->post_id)->first();

        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }
        
        
        $attendance = Attendance::where('post_id',$request->post_id)->where('post_owner_id',$request->owner_id)->where('member_id',$request->member_id)->first();
        if(is_null($attendance)){
        $attendance = new Attendance;
        $attendance->post_id=$request->post_id;
        $attendance->post_owner_id=$request->owner_id;
        $attendance->member_id=$request->member_id;
        $attendance->presence='Present';
        $attendance->save();
        return response()->json('Present User first');
        }else if (!is_null($attendance)){
        $attendance->presence='Present';
        $attendance->save();
        return response()->json('Present User second');
        }
        
        
    }

    public function attendanceAbsent(Request $request){

        $post=Post::where('id',$request->post_id)->first();

        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }
        

        $attendance = Attendance::where('post_id',$request->post_id)->where('post_owner_id',$request->owner_id)->where('member_id',$request->member_id)->first();
        if(is_null($attendance)){
        $attendance = new Attendance;
        $attendance->post_id=$request->post_id;
        $attendance->post_owner_id=$request->owner_id;
        $attendance->member_id=$request->member_id;
        $attendance->presence='Absent';
        $attendance->save();
        return response()->json('Present User first');
        }else if (!is_null($attendance)){
        $attendance->presence='Absent';
        $attendance->save();
        return response()->json('Present User second');
        }
        return response()->json('Absent user');
    }

    public function attendanceCounter(){

    }
}