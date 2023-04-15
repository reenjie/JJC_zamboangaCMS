@php
$events = DB::select('SELECT * FROM `events` where publish = 1 limit 1');
@endphp

<div class="container">
    <a href="/#events" class="btn btn-link btn-sm px-4">Back to Single View</a>
    <hr>
    <h5>All Events</h5>

    <br>
    <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">
        @php
        $events = DB::select('SELECT * FROM `events` where publish = 1 ');
        @endphp
        @foreach ($events as $item)

        <div class="col-lg-3 col-md-6">
            <article>
                <div class="post-img">
                    <div id="carousel-indicator" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carousel-indicator" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carousel-indicator" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carousel-indicator" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
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

                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel-indicator" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel-indicator" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>

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