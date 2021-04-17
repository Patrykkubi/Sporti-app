<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\application;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Models\Attendance;

/**
* @property-read Collection|User[] $users
**/

class ApplicationController extends Controller
{
    public function apply($id){
        
      //jeśli w bazie jest juz aplikcja do tego postu z tym samym userem to odmow dostepu
       $application = application::where('post_id',$id)->where('owner_id',auth()->user()->id)->first();
      
         
      //check if doesnt exist 
      if(is_null($application)){
      //save the request to the database 
            $application = new application;
            $application->owner_id = auth()->user()->id;
            $application->post_id = $id;
            $application->status = 'pending';
            $application->save();
            return redirect('/posts')->with('success', 'Sent join request');
      }
      
      return redirect('/posts')->with('error', 'Can not apply twice');
    }

    public function showSentApplications(){  
      $applications = application::where('owner_id',auth()->user()->id)->get();
      return view('applications.myApplications')->with('applications', $applications);
      }


    public function showRecievedApplications(){
      return view('applications.recievedApplications');
    }

    public function getRecievedApplications(){

      $applications = DB::table('posts')
                              ->join('users','posts.user_id','=','users.id')
                              ->where('users.id','=',auth()->user()->id)
                              ->join('applications','posts.id','=','applications.post_id')
                              ->where('applications.status','=','pending')
                             // ->join('attendances','applications.owner_id','attendances.member_id')
                              ->select('applications.*','users.*','applications.id','posts.sport_name','posts.user_id')
                              ->get();

     //return response()->json($applications);
      // z post member pobrac wszystkich post_member->member_id=application->owner_id
      //czyli
      $resultApplications = [];
      foreach($applications as $app) {
      $users=User::where('id',$app->owner_id)->get();
      
      $joinedPosts= DB::table('post_member')->where('post_member.member_id','=',$app->owner_id)->get()->count();
                            
      //$allPosts=$users->joinedPosts()->get()->count();

      $userAbsences=Attendance::where('member_id',$app->owner_id)->where('presence','Absent')->count();
      $userPresences=$joinedPosts-$userAbsences;
      $resultApplications[]= [
        'id'=>$app->id,
        'name'=>$app->name,
        'allPosts'=>$joinedPosts,
        'userPresences'=>$userPresences,
        'sport_name' => $app->sport_name
      ];
      
      }

      return response()->json($resultApplications);
    }

    public function accept(Request $request){

        
        $application = application::where('id',$request->id)->first();
        $post = $application->post()->first();
        $user = $post->user()->first();

        if(auth()->user()->id == $post->user_id){
          if($post->current_player_count<$post->max_player_count){
            $application->status ='accepted';
            $post->members()->attach($application->owner_id);
            $post->current_player_count+=1;
            $application->save();
            $post->save();
            return response()->json($application);
          }
          return response()->json('Team already full');
         
        }
       
    }

    
    public function decline(Request $request){
      
      $application = application::where('id',$request->id)->first();
      $post = $application->post()->first();
      $user = $post->user()->first();

      if(auth()->user()->id == $post->user_id){
      $application->status ='denied';
      $application->save();
      return response()->json($application);
      }
     
    }
    
}
