@extends('layouts.app', ['activePage' => 'events', 'title' => '', 'navName' => 'Events', 'activeButton' => 'laravel'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">Events</h4>
                        <p class="card-category">Manage Informations</p>
                    </div>
                    <div class="card-body ">
                        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
Add
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Add Blogs</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <form action="{{route('addall')}}" method="post" enctype="multipart/form-data">@csrf

  <div class="modal-body">
    <input type="hidden" name="table" value="events">
    <h6>Photo</h6>
        <input type="file" required name="photofile" class="form-control" />

        <br>
        <h6>Date of Event</h6>
        <Input type="date" class="form-control" name="dateofevent"/>
        <br>
        <h6>Title</h6>
        <textarea name="title" required class="form-control" id="" cols="30" rows="10"></textarea>
    <br>
    <h6>Description</h6>
    <textarea name="desc" required class="form-control" id="" cols="30" rows="10"></textarea>

  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
  </div>
</form>
</div>
</div>
</div>
@if(session()->has('success'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
{{session()->get('success')}}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>
@endif

<table class="table table-striped">
<thead>
<tr>
  <th scope="col">#</th>
  <th scope="col">photo</th>
  <th scope="col">Date of Event</th>
  <th scope="col">Title</th>
  <th scope="col">Description</th>
  <th scope="col">Action</th>
</tr>
</thead>
<tbody>
@php
$events = DB::select('SELECT * FROM `events`');
@endphp 
@foreach ($events as $key=> $item)
        <tr>
            <td>{{$key + 1}}</td>
            <td>
                <img src="assets/img/{{$item->photo}}" style="width:200px;height:200px" alt=""> 
            </td>
            <td><input type="date" data-table="events" data-entity="dateofevent" data-id="{{$item->id}}" class="form-control updateonmove" value="{{$item->dateofevent}}"></td>
            <td><textarea name="" data-table="events" data-entity="title" data-id="{{$item->id}}" class="form-control updateonmove" id="" cols="30" rows="10">{{$item->title}}</textarea></td>
            <td><textarea name="" data-table="events" data-entity="desc" data-id="{{$item->id}}" class="form-control updateonmove" id="" cols="30" rows="10">{{$item->desc}}</textarea></td>
            <td><button data-id="{{$item->id}}" data-table="events" class="btn btn-sm btn-danger delete"><i class="fas fa-trash-can"></i></button></td>
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
    $('.delete').click(function(){
        var id = $(this).data('id');
        var table = $(this).data('table');

       
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
         window.location.href="{{route('deleteall')}}?id="+id+"&table="+table;
        }
        })
    })

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