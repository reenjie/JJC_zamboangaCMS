@extends('layouts.app', ['activePage' => 'others', 'title' => '', 'navName' => 'Others', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Others <span style="font-size:12px">(title Descriptions)</span></h4>
                            <p class="card-category">Manage Informations</p>
                        </div>
                        <div class="card-body ">
                                
                  
            <table class="table table-striped">
                <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Title Description</th>
                  <th scope="col">Description</th>
                
                </tr>
                </thead>
                <tbody>
                    @php
                    $contact = DB::select("SELECT * FROM `descriptions`");
                @endphp
                @foreach ($contact as $key=> $item)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$item->desctype}}</td>
                            <td><textarea name="" data-table="descriptions" style="height:200px" data-entity="desc" data-id="{{$item->id}}" class="form-control updateonmove" id="" cols="30" rows="10">{{$item->desc}}</textarea></td>
                          
                        </tr>
                @endforeach
                
                </tbody>
                </table>
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