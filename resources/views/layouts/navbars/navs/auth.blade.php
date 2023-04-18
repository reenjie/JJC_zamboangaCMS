<nav class="navbar navbar-expand-lg " color-on-scroll="500">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"> {{ $navName }} </a>
        <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="nav navbar-nav mr-auto">
              <span style="margin-left:5px;color:gray"> @if(Auth::user()->role != 3) | CMS @endif</span>
              @if(Auth::user()->role == 3)
                @isset($hide)
                @else

              @php
                $blogs = DB::select('SELECT * FROM `blogs` WHERE publish = 1 and  created_at >= DATE_SUB(NOW(), INTERVAL 2 DAY)');
                $events = DB::Select('SELECT * FROM `events` WHERE publish = 1 and  created_at >= DATE_SUB(NOW(), INTERVAL 2 DAY)');
                $projects = DB::Select('SELECT * FROM `projects` WHERE   created_at >= DATE_SUB(NOW(), INTERVAL 2 DAY)')
            @endphp
                
              <li class="nav-item">
                <a class="nav-link " href="{{route('page.index', 'notifypage')}}">
                  <button type="button" class="btn  @if(count($blogs)>=1 || count($events)>=1 || count($projects)>=1 )  btn-danger @else btn-secondary @endif btn-sm" style="float:right;font-size:11px;text-transform:uppercase">
                   Notifications 

                   @if(count($blogs)>=1 || count($events)>=1)  <span class="badge badge-danger">{{count($blogs) + count($events) + count($projects) }}</span> @else  @endif
                  </button>
                </a>
            </li>
            @endisset
            @endif
            </ul>
            
            @php
                $messages = DB::select('select * from contacts where status =0 ');
                $allmessages = DB::select('select * from contacts order by created_at desc');
            @endphp
          
            <ul class="navbar-nav   d-flex align-items-center">
               
                <button style="float:right;font-size:12px" id="openmessages" data-toggle="modal" data-target="#viewmessage" class="btn btn-sm btn-primary  ">Messages <span class="badge badge-danger @if(count($messages)== 0) d-none @endif">{{count($messages)}}</span></button>
                
              <button class="btn btn-secondary btn-sm" style="float:right;font-size:12px" data-toggle="modal" data-target="#conf">Configuration</button>
        
              {{-- --}}
  <!-- Modal -->
  <div class="modal fade" id="viewmessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-primary" id="exampleModalLabel" style="font-weight:bold">Messages</h5>
          <button type="button" class="close" onclick="window.location.reload()" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
           
                @foreach ($allmessages as $item)
                <div class="col-md-12">
                    <div class="card shadow mb-2">
                        <div class="card-header">
                            <h6>{{$item->email}}</h6>
                            @if($item->status == 0)
                            <span style="float:right" class="badge badge-success">New</span>
                            @endif
                        </div>
                        <div class="card-body">
                            <span style="font-size:14px">{{$item->message}}
                            </span>
                        </div>
                    </div>
                </div>
             
        @endforeach
            </div>
       

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" onclick="window.location.reload()" data-dismiss="modal">Close</button>
         
        </div>
      </div>
    </div>
  </div>
  
  
                <li class="nav-item">
                    <a class="nav-link" href=" {{route('profile.edit') }} ">
                        <span class="no-icon">{{ __('Account') }}</span>
                    </a>
                </li>
            
                <li class="nav-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <a class="text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Log out') }} </a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('#openmessages').click(function(){
      

$.ajax({
        url: "{{route('readmessage')}}",
        method: "GET",
        data: { id: "aww" },
        success: function(response) {
          
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log(textStatus);
        }
        });
    })
</script>