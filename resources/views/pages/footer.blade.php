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
                                
                    @php
                    $contact = DB::select("SELECT * FROM `footers`");
                @endphp
                 @foreach ($contact as $item)          
                 <span style="font-size:13px;color:#F16767;">Changes Saved Automatically..</span>
                <h6>Note :</h6>
                <textarea name="" data-table="footers" data-entity="p1" data-id="{{$item->id}}" class="form-control updateonmove" id="" cols="30" rows="10">{{$item->p1}}</textarea>
                <br>
                <h6>Description:</h6>
                <textarea name="" data-table="footers" style="height:200px" data-entity="p2" data-id="{{$item->id}}" class="form-control updateonmove" id="" cols="30" rows="10">{{$item->p2}}</textarea>
                <br>
                <h6>Description bottom:</h6>
                <textarea name="" data-table="footers" style="height:200px" data-entity="desc" data-id="{{$item->id}}" class="form-control updateonmove" id="" cols="30" rows="10">{{$item->desc}}</textarea>
                
                 @endforeach
                        </div>
                    </div>
                </div>
              
            </div>
        </div>
    </div>
@endsection