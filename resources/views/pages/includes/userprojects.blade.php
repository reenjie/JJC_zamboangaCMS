<div class="container">

    @php
    $events = DB::select('SELECT * FROM `projects`');
    @endphp

    <div class="row">
            @foreach ($events as $item)
            <div class="col-md-4">
            
                <div class="card">
                    <div class="card-body text-center ">
                    
                            @php
                            $allphoto = DB::select('SELECT * FROM `photos` where fkid = '.$item->id.' and photo_type ="projects" ');
                            @endphp
                            @foreach ($allphoto as $key => $pp)
                            <img src="{{asset('assets/img/'.$pp->photos)}}" alt="" style="width: 200px">
                            @endforeach
                    
           
                        <div class="note mt-2">
                           <h6>{{$item->title}}</h6>
                           <p style="font-size:12px">
                            {{$item->desc}} Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, obcaecati sunt nam perferendis corrupti sapiente mollitia rerum ipsam tempora nulla possimus incidunt. Fugit, eligendi? Fuga voluptas nobis quas eos cupiditate.
                        </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
     
    
    </div>
</div>