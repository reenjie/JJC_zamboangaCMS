@extends('layouts.app', ['activePage' => 'blogs', 'title' => '', 'navName' => 'Category', 'activeButton' => 'laravel'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <button class="btn btn-dark btn-sm" onclick="window.location.href='{{route('page.index','blogs')}}' "><i class="fas fa-arrow-left"></i> Back</button>
        <form action="{{route('addall')}}" method="post">@csrf
            <input type="hidden" name="table" value="category">
        <button class="btn btn-primary">Add Category <i class="fas fa-plus-circle"></i></button>
    </form>
        <hr>
           <div class="container">
            @php
                $cat = DB::select('SELECT * FROM `categories` ');
            @endphp
            @foreach ($cat as $item)
            @php
                $validate = DB::select('SELECT * FROM `blogs` where category = '.$item->id.' ');
            @endphp
            <div style="display:flex" class="mb-2">
              
                <span>Status: 
                    @if(count($validate)>=1)
                    <span class="badge bg-success">Used</span>
                    @else 
                    <span class="badge bg-danger">Unused</span>
                    @endif
                   </span>
                <input type="text" class="form-control updateonmove" value="{{$item->category}}"   data-table="categories" data-entity="category" data-id="{{$item->id}}" >
                <form action="{{route('deleteall')}}">@csrf
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <input type="hidden" name="table" value="categories">
                    @if(count($validate)>=1)
                    <Button disabled style="cursor: not-allowed" class="btn btn-light text-secondary"><i class="fas fa-trash"></i></Button>
                    @else 
                    <Button type="submit" class="btn btn-light text-danger"><i class="fas fa-trash"></i></Button>
                    @endif
                  
                </form>
               
            </div>
            <hr>
            @endforeach
        
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