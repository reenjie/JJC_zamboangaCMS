<style>
    .activee{
        background-color: #3C486B;
    }
</style>
@php
$teams = DB::select('SELECT * FROM `teams` where dump = 0 ');
$inteams = DB::select('SELECT * FROM `teams` where dump = 1 ');
@endphp
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="font-size:13px">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="pills-home-tab" style=""  data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Current Active Team</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Previous Team</button>
    </li>

  </ul>
  <div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
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
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">    <div class="row gy-4">
  
        @foreach ($inteams as $item)
        <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
          <div class="member">
        
            <img src="assets/img/{{$item->photo}}" class="img-fluid" alt="">
            <h4>{{$item->name}}</h4>
            <span>{{$item->desc}}</span>
            <span class="badge bg-danger text-light" style="font-size:11px;text-transform:uppercase">Inactive Members since : {{date('F j,Y',strtotime($item->updated_at))}}</span>
            <div class="social">
              <a href="{{$item->twitter}}"><i class="bi bi-twitter"></i></a>
              <a href="{{$item->facebook}}"><i class="bi bi-facebook"></i></a>
              <a href="{{$item->instagram}}"><i class="bi bi-instagram"></i></a>
              <a href="{{$item->linkedin}}"><i class="bi bi-linkedin"></i></a>
             
            </div>
         
          </div>
        </div><!-- End Team Member -->
        @endforeach
    
    
    
      </div></div>
   
  </div>
