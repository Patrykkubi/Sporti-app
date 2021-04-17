@extends('layouts.app')
@section('content')


<h1>Team Members</h1>
@if(count($members)>0)
    @foreach ($members as $member)
    <div id = "attendance" class='d-flex justify-content-around align-items-center '>
        <h1>{{$member->name}}</h1>
        <form id=accept-form action='/post-members/attendance/present' method=post>
            <button type="button" data-post_id="{{$member->post_id}}" data-owner_id="{{$member->user_id}}"  data-member_id="{{$member->member_id}}"  class="present btn btn-primary">Present</button>
        </form>
        <form id=accept-form action='/post-members/attendance/absent' method=post>
            <button type="button" data-post_id="{{$member->post_id}}" data-owner_id="{{$member->user_id}}"  data-member_id="{{$member->member_id}}" class="absent btn btn-danger">Absent</button>
        </form>
        
    </div>
    @endforeach

@else
<p>No current members</p>
@endif


<script type='text/javascript'>
 
$(document).on('click','.present',function(e) {

const url = `/post-members/attendance/present`; // the script where you handle the form input.

const postId = $(this).data('post_id');
const ownerId = $(this).data('owner_id');
const memberId = $(this).data('member_id');
console.log(postId,ownerId,memberId);
e.preventDefault();

$.ajax({
       type: "POST",
       url: url,
       data: { "_token": "{{ csrf_token() }}", post_id: postId, owner_id: ownerId, member_id: memberId }, 
       dataType:'JSON',
       success: function(data)
       {
        $('#attendance').addClass('bg-success');
        $('#attendance').removeClass('bg-danger');
        console.log(data);
       }
     });
});

 
$(document).on('click','.absent',function(e) {

const url = `/post-members/attendance/absent`; // the script where you handle the form input.


const postId = $(this).data('post_id');
const ownerId = $(this).data('owner_id');
const memberId = $(this).data('member_id');
console.log(postId,ownerId,memberId);
e.preventDefault();

$.ajax({
       type: "POST",
       url: url,
       data: { "_token": "{{ csrf_token() }}", post_id: postId, owner_id: ownerId, member_id: memberId }, 
       dataType:'JSON',
       success: function(data)
       {
        $('#attendance').addClass('bg-danger');
        $('#attendance').removeClass('bg-success');
        
       }
     });
});


</script>



@endsection

