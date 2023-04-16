<div class="container">
    @php
        $teams = DB::select('SELECT * FROM `teams` where dump = 0 ');
    @endphp
    <div class="row gy-4">
  
        @foreach ($teams as $item)
        <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
          <div class="member">
            <img src="assets/img/{{$item->photo}}" class="img-fluid" alt="">
            <h4>{{$item->name}}</h4>
            <span>{{$item->desc}}</span>
            <div class="social">
              <a href="{{$item->twitter}}"><i class="bi bi-twitter"></i></a>
              <a href="{{$item->facebook}}"><i class="bi bi-facebook"></i></a>
              <a href="{{$item->instagram}}"><i class="bi bi-instagram"></i></a>
              <a href="{{$item->linkedin}}"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div><!-- End Team Member -->
        @endforeach
    
    
    
      </div>
</div>