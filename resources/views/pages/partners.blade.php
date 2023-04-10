@extends('layouts.app', ['activePage' => 'partners', 'title' => '', 'navName' => 'partners', 'activeButton' => 'laravel'])

@section('content')
<div class="content">
    <div class="container-fluid">
      @if(session()->has('success'))
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
          swal({
        title: "Success!",
        text: "{{session()->get('success')}}",
        icon: "success",
      });
        </script>
      @endif
        <div class="row">
            <div class="col-md-12">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Members</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Pledges</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Volunteer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="vol-tab" data-toggle="tab" href="#voltab" role="tab" aria-controls="contact" aria-selected="false">Partnership</a>
                  </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">@include('component.members')</div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">@include('component.pledges')</div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">@include('component.volunteers')</div>
                <div class="tab-pane fade" id="voltab" role="tabpanel" aria-labelledby="vol-tab">@include('component.partnerships')</div>
              </div>
      
                {{-- <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                       
                        <h4 class="card-title">Partners</h4>
                        <p class="card-category">Manage Informations</p>
                    </div>
                    <div class="card-body ">
                    
                  
                    </div>
                </div> --}}
            </div>
          
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>
<script>
     $('#member').DataTable();
     $('#pledges').DataTable();
     $('#volunteer').DataTable();
     $('#partnership').DataTable();

    $('.updateonmove').focusout(function(){
   var  val = $(this).val();
   var id   = $(this).data('id');
   var table = $(this).data('table');
   var entity = $(this).data('entity');

   $.ajax({
    url: "{{route('updateentities')}}",
    method: "GET",
    data: { id: id, table: table,entity:entity,value:val },
    success: function(response) {
    
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(textStatus);
    }
    });

 
   })
   </script>
@endsection