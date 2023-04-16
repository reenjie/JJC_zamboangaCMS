@extends('layouts.app', ['activePage' => 'contacts', 'title' => '', 'navName' => 'Contacts', 'activeButton' => 'laravel'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                       
                      
                        @if(Auth::user()->role !=3)  <h4 class="card-title">Contacts</h4><p class="card-category">Manage Informations</p> @endif
                    </div>
                    <div class="card-body ">
                    
                       
                    @php
                        $contact = DB::select("SELECT * FROM `contactdetails`");
                    @endphp
                     @foreach ($contact as $item)          
                     @if(Auth::user()->role !=3)     <span style="font-size:13px;color:#F16767;">Changes Saved Automatically..</span>
                    <h6>Location:</h6>
                    <textarea name="" data-table="contactdetails" data-entity="location" data-id="{{$item->id}}" class="form-control updateonmove" id="" cols="30" rows="10">{{$item->location}}</textarea>
                    <br>
                    <h6>Email:</h6>
                    <textarea name="" data-table="contactdetails" data-entity="email" data-id="{{$item->id}}" class="form-control updateonmove" id="" cols="30" rows="10">{{$item->email}}</textarea>
                    <br>
                    <h6>Phone Details:</h6>
                    <textarea name="" data-table="contactdetails" data-entity="phonedetails" data-id="{{$item->id}}" class="form-control updateonmove" id="" cols="30" rows="10">{{$item->phonedetails}}</textarea>
                     <br>
                     <h6>Open Details:</h6>
                     <textarea name="" data-table="contactdetails" data-entity="opendetails" data-id="{{$item->id}}" class="form-control updateonmove" id="" cols="30" rows="10">{{$item->opendetails}}</textarea>  
                     <br> 
                     <h6>Facebook Links:</h6>
                     <textarea name="" data-table="contactdetails" data-entity="facebook" data-id="{{$item->id}}" class="form-control updateonmove" id="" cols="30" rows="10">{{$item->facebook}}</textarea>
                     <br>
                     <h6>Twitter Links:</h6>
                     <textarea name="" data-table="contactdetails" data-entity="twitter" data-id="{{$item->id}}" class="form-control updateonmove" id="" cols="30" rows="10">{{$item->twitter}}</textarea>
                     <br>
                     <h6>Instagram Links:</h6>
                     <textarea name="" data-table="contactdetails" data-entity="instagram" data-id="{{$item->id}}" class="form-control updateonmove" id="" cols="30" rows="10">{{$item->instagram}}</textarea>
                     <br>
                     <h6>Linkedin Links:</h6>
                     <textarea name="" data-table="contactdetails" data-entity="linkedin" data-id="{{$item->id}}" class="form-control updateonmove" id="" cols="30" rows="10">{{$item->linkedin}}</textarea>
                     @else 
                        <div class="text-center">
                            <h6>Location:</h6>
                            {{$item->location}}
                            <p></p>
                            
                            <h6>Email:</h6>
                        {{$item->email}}
                        <p></p>
                            <h6>Phone Details:</h6>
                           {{$item->phonedetails}}
                           <p></p>
                             <h6>Open Details:</h6>
                            {{$item->opendetails}}
                            <p></p>
                             <h6>Facebook Links:</h6>
                           {{$item->facebook}}
                           <p></p>
                             <h6>Twitter Links:</h6>
                           {{$item->twitter}}
                           <p></p>
                             <h6>Instagram Links:</h6>
                             {{$item->instagram}}
                             <p></p>
                             <h6>Linkedin Links:</h6>
                            {{$item->linkedin}}
       
                        </div>

                     @endif
                     @endforeach
                    </div>
                </div>
            </div>
          
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>

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