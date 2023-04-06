@extends('layouts.app', ['activePage' => 'headerandabout', 'title' => '', 'navName' => 'Header & Aboutus', 'activeButton' => 'laravel'])

@section('content')
    @php
        $header = DB::select('select * from headers');
        $aboutus = DB::select('SELECT * FROM `aboutuses`');
        $headervideo = DB::select('SELECT * FROM `header_videos`');
    @endphp
 
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Header and About Us</h4>
                            <p class="card-category">Manage Informations</p>
                        </div>

                        <div class="card-body ">
                          
                       
                            @if(session()->has('success'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                {{session()->get('success')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                            @endif
                            @foreach ($header as $item)
                                
                          
                            <h5>Title</h5>
                            <textarea name=""  data-id="{{$item->id}}" data-table="headers" data-entity="welcome_message" id="textarea1" class="updateonmove  form-control" >{{$item->welcome_message}}</textarea>
                              <input type="hidden" data-table="headers" data-entity="welcome_message" id="texta1" data-id="{{$item->id}}" >

                            <br>
                            <h5>Description</h5>
                          
                            <textarea name=""  style="height: 120px" id="textarea2" class="textarea form-control updateonmove" >{{$item->welcome_desc}}</textarea>
                              <input type="hidden" data-table="headers" data-entity="welcome_desc" data-id="{{$item->id}}" id="texta2" >
                            @endforeach
                            <br>
                            <!-- Button trigger modal -->
                            <h5>Video Links</h5>
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
  <i class="fas fa-plus-circle"></i> Add 
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Video links</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('addvideolink')}}" method="post">
            @csrf
        <div class="modal-body">
            <h6>VideoLink Plugins</h6>
            <textarea name="videolink" class="form-control" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>


  @foreach ($headervideo as $key => $item)
  <div class="card">
    <div class="card-body">
        <span style="font-size:10px;color:gray">VIDEOLINKS</span>
        <br>

         
      <td>{{$item->videolinks}}</td>
    
          <button style="float:right" data-id="{{$item->id}}"  class="deletevideolinks btn-sm btn btn-danger" ><i class="fas fa-trash-can"></i></button>

      
   
    </div>
    
    </div>
  @endforeach
  

 <br>
 <h5>About US</h5>
 @foreach ($aboutus as $item)
     
 
 <h5>Title</h5>
 <textarea name="" id="" data-table="aboutuses" data-entity="title" data-id="{{$item->id}}" class="form-control updateonmove" >{{$item->title}}</textarea>
 
 <br>
 <h5>Subtitle</h5>
 <textarea name="" id="" data-table="aboutuses" data-entity="subtitle" data-id="{{$item->id}}" class="form-control updateonmove" >{{$item->subtitle}}</textarea>
<br>
 <h5>Description</h5>
 <textarea name="" id="textarea3" style="height:200px" data-table="aboutuses" data-entity="desc" data-id="{{$item->id}}" class="form-control updateonmove" >{{$item->desc}}</textarea>
 <input type="hidden" data-table="aboutuses" data-entity="desc" data-id="{{$item->id}}" data-id="{{$item->id}}" id="texta3" >
 <br>
    <h5>Mission</h5>
 <textarea name="" id="textarea4" style="height:200px" data-table="aboutuses" data-entity="mission_desc" data-id="{{$item->id}}" class="form-control updateonmove" >{{$item->mission_desc}}</textarea>
 <input type="hidden" data-table="aboutuses" data-entity="mission_desc" data-id="{{$item->id}}" id="texta4" >  
 <br>
 
 <h5>Vision</h5>
 <textarea name="" id="textarea5" style="height:200px" data-table="aboutuses" data-entity="vision_desc" data-id="{{$item->id}}" class="form-control updateonmove" >{{$item->vision_desc}}</textarea>
 <input type="hidden" data-table="aboutuses" data-entity="vision_desc" data-id="{{$item->id}}" id="texta5" >  
 <br>

   <div class="card shadow">
    <div class="card-body">
        <form action="{{route('savePhoto')}}" method="post" enctype="multipart/form-data">
            @csrf
      
        <h5 style="text-align:center">
            <img src="assets/img/{{$item->photo}}" style="width: 400px" alt=""></h5>
            <input type="hidden" value="{{$item->id}}" name="id">
     <h5>Upload or Change Photo</h5>
     <input type="file" required class="form-control" name="photofile">
            <br>
     <button type="submit" class="btn btn-dark btn-sm" style="float:right">Save Photo</button>
    </form>
    </div>
   </div>

   @endforeach
 
                        </div>
                    </div>
                </div>
              
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
 <script>
const editor1 = ClassicEditor.create( document.querySelector( '#textarea1' ) ).then( editor => {
            console.log( 'Editor was initialized', editor );
            myEditor = editor;

  
 myEditor.model.document.on( 'change:data', () => {
  const editorContent = editor.getData();

  $('#texta1').val(editorContent);
  var id = $('#texta1').data('id');
  var  val = $('#texta1').val();
  var table = $('#texta1').data('table');
  var entity = $('#texta1').data('entity');

  $.ajax({
        url: "{{route('updateentities')}}",
        method: "GET",
        data: { id: id, table:table,entity:entity,value:val },
        success: function(response) {
        
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log(textStatus);
        }
        });
});

        });
const editor2 = ClassicEditor.create( document.querySelector( '#textarea2' ) ).then( editor => {
            console.log( 'Editor was initialized', editor );
            myEditor = editor;

  
 myEditor.model.document.on( 'change:data', () => {
  const editorContent = editor.getData();

  $('#texta2').val(editorContent);
  var id = $('#texta2').data('id');
  var  val = $('#texta2').val();
  var table = $('#texta2').data('table');
  var entity = $('#texta2').data('entity');

  $.ajax({
        url: "{{route('updateentities')}}",
        method: "GET",
        data: { id: id, table:table,entity:entity,value:val },
        success: function(response) {
        
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log(textStatus);
        }
        });
});

        });

        const editor3 = ClassicEditor.create( document.querySelector( '#textarea3' ) ).then( editor => {
       
            myEditor = editor;

  
 myEditor.model.document.on( 'change:data', () => {
  const editorContent = editor.getData();

  $('#texta3').val(editorContent);
  var id = $('#texta3').data('id');
  var  val = $('#texta3').val();
  var table = $('#texta3').data('table');
  var entity = $('#texta3').data('entity');

  $.ajax({
        url: "{{route('updateentities')}}",
        method: "GET",
        data: { id: id, table:table,entity:entity,value:val },
        success: function(response) {
        
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log(textStatus);
        }
        });
});

        });

        const editor4 = ClassicEditor.create( document.querySelector( '#textarea4' ) ).then( editor => {
       
       myEditor = editor;


myEditor.model.document.on( 'change:data', () => {
const editorContent = editor.getData();

$('#texta4').val(editorContent);
var id = $('#texta4').data('id');
var  val = $('#texta4').val();
var table = $('#texta4').data('table');
var entity = $('#texta4').data('entity');

$.ajax({
   url: "{{route('updateentities')}}",
   method: "GET",
   data: { id: id, table:table,entity:entity,value:val },
   success: function(response) {
   
   },
   error: function(jqXHR, textStatus, errorThrown) {
     console.log(textStatus);
   }
   });
});

   });


   const editor5 = ClassicEditor.create( document.querySelector( '#textarea5' ) ).then( editor => {
       
       myEditor = editor;


myEditor.model.document.on( 'change:data', () => {
const editorContent = editor.getData();

$('#texta5').val(editorContent);
var id = $('#texta5').data('id');
var  val = $('#texta5').val();
var table = $('#texta5').data('table');
var entity = $('#texta5').data('entity');

$.ajax({
   url: "{{route('updateentities')}}",
   method: "GET",
   data: { id: id, table:table,entity:entity,value:val },
   success: function(response) {
   
   },
   error: function(jqXHR, textStatus, errorThrown) {
     console.log(textStatus);
   }
   });
});

   });


/* textarea3*/
  </script>
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
        
      $('.deletevideolinks').click(function(){
        var id = $(this).data('id');
        $(this).html('Deleting');
        $.ajax({
        url: "{{route('deletevlinks')}}",
        method: "GET",
        data: { id: id },
        success: function(response) {
            if(response == "success"){
                window.location.reload();
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log(textStatus);
        }
        });
      })
    </script>
@endsection