<div class="container">
    <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">
        @php
        $events = DB::select('SELECT * FROM `events` where publish = 1 ');
        @endphp
        @foreach ($events as $item)

        <div class="col-lg-3 col-md-6" style="border:1px solid gray;border-radius:10px;padding:10px">
            <article>
                <div class="post-img">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @php
                            $allphoto = DB::select('SELECT * FROM `photos` where fkid = '.$item->id.' and photo_type ="events" ');
                            @endphp
                            @foreach ($allphoto as $key => $pp)
                            @if($key == 0)
                            <div class="carousel-item active">
                                <img class="d-block" style="width: 100%;height:300px" src="{{asset('assets/img/'.$pp->photos)}}" alt="First slide">
                            </div>
                            @else
                            <div class="carousel-item">
                                <img class="d-block " style="width: 100%;height:300px" src="{{asset('assets/img/'.$pp->photos)}}" alt="Second slide">
                            </div>
                            @endif
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                </div>
                <p class="post-date">
                    <time datetime="2022-01-01">{{date('F j,Y',strtotime($item->startdate)).' - '.date('F j,Y',strtotime($item->enddate))}}</time>
                </p>
                <h3 class="title">
                    <a href="">{!!$item->title!!}</a>
                </h3>
                <p class="event-description">{!!$item->desc!!}</p>
                <div class="buttons d-grid gap-2">
                    <button class="btn btn-primary" type="button">Attend</button>
                    <button class="btn btn-primary" onclick="window.location.href='{{route('membershipform',['page'=>'volunteer'])}}'" type="button">Volunteer</button>
                </div>
            </article>
        </div><!-- End Events Item -->
        @endforeach






    </div>
</div>