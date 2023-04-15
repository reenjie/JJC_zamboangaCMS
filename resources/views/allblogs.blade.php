@php
$blogs = DB::select('SELECT * FROM `blogs` where publish = 1 ');
$cat = DB::select('SELECT * FROM `categories` ');
@endphp

<div class="container">
    <a href="/#recent-posts" class="btn btn-link btn-sm px-4">Back to Single View</a>
    <hr>
    <h5>All Blog Post</h5>

    <div class="row">
        @foreach($blogs as $row)

        <div class="col-xl-4 col-md-6">
            <article>
                <div id="carousel-indicator" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carousel-indicator" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carousel-indicator" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carousel-indicator" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        @php
                        $allphoto = DB::select('SELECT * FROM `photos` where fkid = '.$row->id.' and photo_type ="blogs" ');
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

                </div><!-- End Slides with indicators -->
                <p class="post-category">
                    @foreach ($cat as $ll)
                    @if($ll->id == $row->category)
                    {{$ll->category}}
                    @endif


                    @endforeach
                </p>
                <h2 class="title">
                    <a href="#">{!!$row->title !!}</a>
                </h2>
                <p class="post-date">
                    {{date('F j,Y',strtotime($row->created_at))}}
                </p>
            </article>
        </div><!-- End post list item -->
        @endforeach


    </div>
</div>