@extends('layouts.app')
@section('content')
<h1>Recieved Applications</h1>
<script type="text/javascript">

//ajax asynchroniczny


      function getMessage() {
            $.ajax({
               type:'GET',
               url:'/getRecievedApplications',
               data:'_token = <?php echo csrf_token() ?>',
               dataType:'JSON',
               success:function(data) {
                  console.log(data);
               if(data.length>0){
                  
               updateApplications(data);
               acceptApplications();
               declineApplications();
              // console.log(data);
               } else{
                  let newHtml= '';
                  newHtml = "<p>No new applications</p>";
                  $('#appContainer').html(newHtml);
                  }
               }
            });
         }

      
         
      function updateNotifications() {
         getMessage();
         setTimeout(()=>{ updateNotifications(); }, 2000); // funkcja wywołuje samą siebie za 2 sekundy
      }
      
      updateNotifications(); // tu używam po raz pierwszy, żeby uruchomić rekurencję


   function updateApplications(applicationsArray) {
         let newHtml = "";
         applicationsArray.forEach((app) => {
         newHtml += renderApplicationDiv(app);
         });
         $('#appContainer').html(newHtml);
   }

   function renderApplicationDiv(app) {
      const acceptFormHtml = renderAcceptApplicationForm(app);
      const rejectFormHtml = renderRejectApplicationForm(app);
      const appText = app.name+" chce zagrać w "+app.sport_name;
      const attendances = app.userPresences+"/"+app.allPosts;
      const attendancesPercent = app.userPresences/app.allPosts*100;
      const percent=attendancesPercent.toFixed(2);
      return html = `<div id="contact_form" class='application d-flex justify-content-around align-items-center'><p>${appText}</p><p>${attendances}</p><p>${percent}</p>${acceptFormHtml} ${rejectFormHtml} </div>`;
   }

   function renderAcceptApplicationForm(app) {
     const id = app.id;
     return html=`<div class=form-group><form id=accept-form action=/applications/accept method=post><button type="button" data-id="${id}" class="accept btn btn-primary">Accept</button></form></div>`;
    
   }

   function renderRejectApplicationForm(app){
      const id = app.id;
      return html=`<div class=" form-group"><form id="decline-form" action=/applications/decline method=post><button type="button" data-id="${id}" class=" decline btn btn-danger">decline</button></form></div>`;
      
   }
 

function acceptApplications(){
$(".accept").on('click',function(e) {

const url = `/applications/accept`; // the script where you handle the form input.

const appId = $(this).data('id');


e.preventDefault();

$.ajax({
       type: "POST",
       url: url,
       data: { "_token": "{{ csrf_token() }}", id: appId}, // serializes the form's elements.
       dataType:'JSON',
       success: function(data)
       {
         getMessage();
         
       }
     });
});
}


function declineApplications(){
$(".decline").on('click',function(e) {

const url = `/applications/decline`; // the script where you handle the form input.
const appId = $(this).data('id');

e.preventDefault();

$.ajax({
       type: "POST",
       url: url,
       data:{ "_token": "{{ csrf_token() }}", id: appId, }, // serializes the form's elements.
       dataType:'JSON',
       success: function(data)
       {
         getMessage();
        
       }
     });
});
}

  

  
      </script>
   
   <div id="appContainer">
      

   </div>
 
   


@endsection