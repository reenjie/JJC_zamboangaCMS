@extends('layouts.app', ['activePage' => '', 'title' => '', 'navName' => 'NOTIFICATIONS', 'activeButton' => 'laravel' , 'hide'=>'1'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-sm" style="font-size:13px">
                    <thead>
                      <tr>
                       
                        <th scope="col">Type of Notification</th>
                        <th>status</th>
                        <th scope="col">Created_at</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $blogs = DB::select('SELECT * FROM `blogs` WHERE publish = 1 and  created_at >= DATE_SUB(NOW(), INTERVAL 5 DAY)');
                            $events = DB::Select('SELECT * FROM `events` WHERE publish = 1 and  created_at >= DATE_SUB(NOW(), INTERVAL 5 DAY)');
                            $projects = DB::Select('SELECT * FROM `projects` WHERE   created_at >= DATE_SUB(NOW(), INTERVAL 5 DAY)')
                        @endphp
                        @foreach ($blogs as $item)
                        <tr>
                          
                            <td  class="table-danger">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="text-primary"  style="font-size: 11px;text-transform:uppercase;font-weight:normal" >BLOG</h6>
                                    <hr>
                                  
                                        {!!$item->title!!}
                               
                               
                                        {!!$item->description!!} <span style="float:right">{{$item->dateblog}}</span>
                                    <button class="btn btn-primary btn-sm px-4" onclick="window.location.href= '{{route('page.index','blogs')}}' ">View <i class="fas fa-arrow-right"></i></button>

                                </div>
                            </div>
                            </td>
                            <td>
                                @php
                                    $interval_days = floor((time() - strtotime($item->dateblog)) / 86400);
                                @endphp
                             
                                <span class="badge bg-success">NEW      @if($interval_days >=1 )
                                  |  {{$interval_days}} day/s ago
                                    @endif</span>
                            </td>
                            <td><h6>{{date('F j, Y')}}</h6></td>
                         
                          </tr>
                        @endforeach
                        @foreach ($events as $item)
                        <tr>
                          
                            <td class="table-primary">
                            <div class="card">
                                <div class="card-body">
                                    <h6  class="text-primary" style="font-size: 11px;text-transform:uppercase;font-weight:normal" >EVENT</h6>
                                    <hr>
                                  
                                        {!!$item->title!!}
                                 
                                 
                                        {!!$item->desc!!} <span style="float:right">{{$item->created_at}}</span>
                                        <button class="btn btn-primary btn-sm px-4" onclick="window.location.href= '{{route('page.index','events')}}'" >View <i class="fas fa-arrow-right"></i></button>

                                </div>
                            </div>
                            </td>
                            <td>
                                @php
                                $interval_days = floor((time() - strtotime($item->created_at)) / 86400);
                            @endphp
                         
                            <span class="badge bg-success">NEW      @if($interval_days >=1 )
                              |  {{$interval_days}} day/s ago
                                @endif</span>
                            </td>
                            <td><h6>{{date('F j, Y')}}</h6></td>
                            
                          </tr>
                        @endforeach

                        @foreach ($projects as $item)
                        <tr>
                          
                            <td class="table-info">
                            <div class="card">
                                <div class="card-body">
                                    <h6  class="text-primary" style="font-size: 11px;text-transform:uppercase;font-weight:normal" >PROJects</h6>
                                    <hr>
                                  
                                        {!!$item->title!!}
                                 
                                    <br>
                                        {!!$item->desc!!} <span style="float:right">{{$item->created_at}}</span>
                                        <br>
                                        <button class="btn btn-primary btn-sm px-4" onclick="window.location.href= '{{route('page.index','projects')}}'" >View <i class="fas fa-arrow-right"></i></button>

                                </div>
                            </div>
                            </td>
                            <td>
                                @php
                                $interval_days = floor((time() - strtotime($item->created_at)) / 86400);
                            @endphp
                         
                            <span class="badge bg-success">NEW      @if($interval_days >=1 )
                              |  {{$interval_days}} day/s ago
                                @endif</span>
                            </td>
                            <td><h6>{{date('F j, Y')}}</h6></td>
                            
                          </tr>
                        @endforeach
            
                    </tbody>
                  </table>

            </div>
        </div>
      
    </div>
</div>
@endsection