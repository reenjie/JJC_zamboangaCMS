@extends('layouts.app', ['activePage' => 'footer', 'title' => '', 'navName' => 'Footer', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Footer</h4>
                            <p class="card-category">Manage Informations</p>
                        </div>
                        <div class="card-body ">

                           
                            <br>
                                
                    @php
                    $contact = DB::select("SELECT * FROM `footers`");
                @endphp
                 @foreach ($contact as $item)          
                 <span style="font-size:13px;color:#F16767;">Changes Saved Automatically..</span>
                <h6>Note :</h6>
                <textarea name=""  id="textarea1" class="form-control updateonmove" id="" cols="30" rows="10">{{$item->p1}}</textarea>
                <input type="hidden" data-table="footers" data-entity="p1" data-id="{{$item->id}}" id="texta1" >
                <br>
                <h6>Description:</h6>
                <textarea name="" data-table="footers" style="height:200px" data-entity="p2" data-id="{{$item->id}}" class="form-control updateonmove" id="textarea2" cols="30" rows="10">{{$item->p2}}</textarea>
                <input type="hidden"  data-table="footers" data-entity="p2" data-id="{{$item->id}}" id="texta2" >
                <br>
                <h6>Description bottom:</h6>
                <textarea name="" data-table="footers" style="height:200px" data-entity="desc" data-id="{{$item->id}}" class="form-control updateonmove" id="textarea3" cols="30" rows="10">{{$item->desc}}</textarea>
                <input type="hidden"  data-table="footers" data-entity="desc" data-id="{{$item->id}}" id="texta3" >
                 @endforeach
                        </div>
                    </div>

                    @include('component.subscription')
                </div>
              
            </div>
        </div>
    </div>

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
            console.log( 'Editor was initialized', editor );
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