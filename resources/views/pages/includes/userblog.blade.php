<div class="container">
@php
  $blogs = DB::select('select * from blogs where publish = 1 ');
@endphp

<div class="row">
    @foreach($blogs as $row)

    <div class="col-xl-4 col-md-6 shadow" style="border:1px solid gray;border-radius:10px">
        <article>
        

            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
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
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
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