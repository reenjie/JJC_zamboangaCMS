@extends('layouts.homepage')

@section('content')

@php
$contactdetails = DB::select('SELECT * FROM `contactdetails`');
$headers = DB::select('SELECT * FROM `headers`');
$aboutus = DB::select('SELECT * FROM `aboutuses`');
$description = DB::select('SELECT * FROM `descriptions`');
@endphp

<!-- ======= Hero Section ======= -->
<section id="hero" class="hero">
  <div class="container position-relative">
    <div class="row gy-5" data-aos="fade-in">
      <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
        <h2>{{$headers[0]->welcome_message}}</span></h2>
        <p>{{$headers[0]->welcome_desc}}</p>
        <div class="d-flex justify-content-center justify-content-lg-start">
          <a href="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2Fjjczamboanga2021%2Fvideos%2F3038624199732640%2F&show_text=false&width=560&t=0"  class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
        </div>
      </div>
      <div class="col-lg-6 order-1 order-lg-2">
        <img src="assets/img/hero-img.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100">
      </div>
    </div>
  </div>

  <div class="icon-boxes position-relative">
    <div class="container position-relative">
      <div class="row gy-4 mt-5">

        <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="icon-box">
            <div class="icon"><i class="bi bi-person-badge"></i></div>
            <h4 class="title"><a href="{{route('membershipform',["page"=>"membership"])}}" class="stretched-link">BE A MEMBER</a></h4>
          </div>
        </div>
        <!--End Icon Box -->

        <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="icon-box">
            <div class="icon"><i class="bi bi-box2-heart"></i></div>
            <h4 class="title"><a href="{{route('membershipform',["page"=>"pledge"])}}" class="stretched-link">PLEDGE</a></h4>
          </div>
        </div>
        <!--End Icon Box -->

        <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="icon-box">
            <div class="icon"><i class="bi bi-hand-index-thumb"></i></div>
            <h4 class="title"><a href="{{route('membershipform',["page"=>"volunteer"])}}" class="stretched-link">VOLUNTEER</a></h4>
          </div>
        </div>
        <!--End Icon Box -->

        <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
          <div class="icon-box">
            <div class="icon"><i class="bi bi-people"></i></div>
            <h4 class="title"><a href="{{route('membershipform',["page"=>"partner"])}}" class="stretched-link">PARTNER WITH US</a></h4>
          </div>
        </div>
        <!--End Icon Box -->

      </div>
    </div>
  </div>

  </div>
</section>
<!-- End Hero Section -->



  <!-- ======= About Us Section ======= -->
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>About Us</h2>
      </div>

      <div class="row content">
        <div class="col-lg-6">
          <h4>{{$aboutus[0]->title}}</h4>
          <p>
            <span>{{$aboutus[0]->subtitle}}</span>  <br> <br> 
            {{$aboutus[0]->desc}}<br>
          </p>
        </div>

        <div class="col-lg-6 pt-4 pt-lg-0">
          <h4>MISSION</h4>
          <p>
            {{$aboutus[0]->mission_desc}}
          </p>
          
          <h4>VISION</h4>
          <p>
           {{$aboutus[0]->vision_desc}}
          </p>
          <a href="#" class="btn-learn">Learn More</a>
        </div>
      </div>
    </div>
  </section><!-- End About Us Section --> 

  <!-- ======= Stats Counter Section ======= -->
  <section id="stats-counter" class="stats-counter">
    <div class="container" data-aos="fade-up">

      <div class="row gy-4 align-items-center">

        <div class="col-lg-6">
          <img src="assets/img/{{$aboutus[0]->photo}}" alt="" class="img-fluid">
        </div>

        <div class="col-lg-6">
          @php
              $members = DB::select('select * from partners');
              $pledge  = DB::select('select * from pledges');
              $volunteers = DB::select('select * from partners where volunteer = 1');
              $partner    = DB::select('select * from partners where partnership = 1');
          @endphp

          <div class="stats-item d-flex align-items-center">
            <i class="bi bi-person-badge"></i>
            <span data-purecounter-start="0" data-purecounter-end="{{count($members)}}" data-purecounter-duration="1" class="purecounter"></span>
            <p><strong>Members</strong></p>
          </div><!-- End Stats Item -->

          <div class="stats-item d-flex align-items-center">
            <i class="bi bi-box2-heart"></i>
            <span data-purecounter-start="0" data-purecounter-end="{{count($pledge)}}" data-purecounter-duration="1" class="purecounter"></span>
            <p><strong>Pledge</strong></p>
          </div><!-- End Stats Item -->

          <div class="stats-item d-flex align-items-center">
            <i class="bi bi-hand-index-thumb"></i>
            <span data-purecounter-start="0" data-purecounter-end="{{count($volunteers)}}" data-purecounter-duration="1" class="purecounter"></span>
            <p><strong>Volunteers</strong></p>
          </div><!-- End Stats Item -->

          <div class="stats-item d-flex align-items-center">
            <i class="bi bi-people"></i>
            <span data-purecounter-start="0" data-purecounter-end="{{count($partner)}}" data-purecounter-duration="1" class="purecounter"></span>
            <p><strong>Partnership</strong></p>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </div>
  </section><!-- End Stats Counter Section -->

  <!-- ======= Recent Blog Posts Section ======= -->
  <section id="recent-posts" class="recent-posts sections-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>Recent Blog Posts</h2>
        <p>{{$description[0]->desc}}</p>
      </div>

      <div class="row gy-4">
        @php
            $blogs = DB::select('SELECT * FROM `blogs`');
        @endphp
        @foreach ($blogs as $item)
        <div class="col-xl-4 col-md-6">
          <article>
            <div id="carousel-indicator" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carousel-indicator" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carousel-indicator" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carousel-indicator" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                  <div class="carousel-item active">
                      <img src="assets/img/{{$item->photo}}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                      <img src="assets/img/{{$item->photo}}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                      <img src="assets/img/{{$item->photo}}" class="d-block w-100" alt="...">
                  </div>
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
            <p class="post-category">{{$item->subtitle}}</p>
            <h2 class="title">
              <a href="blog-details.html">{{$item->title}}</a>
            </h2>
            <p class="post-date">
              <time datetime="2022-01-01">{{date('F j,Y',strtotime($item->dateblog))}}</time>
            </p>
          </article>
        </div><!-- End post list item -->
        @endforeach
   



     
      </div><!-- End post list item -->
      <a href="blog.html" class="btn-large">See More</a>
    </div><!-- End recent posts list -->
  </section><!-- End Recent Blog Posts Section -->

  <!-- =======  Events Section ======= -->
  <section id="events" class="events">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>Latest Events</h2>
        <p>{{$description[1]->desc}}</p>
      </div>

      <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">
        @php
            $events = DB::select('SELECT * FROM `events`');
        @endphp
        @foreach ($events as $item)
              
        <div class="col-lg-3 col-md-6">
          <article>
            <div class="post-img">
              <img src="assets/img/{{$item->photo}}" alt="" class="img-fluid">
            </div>
            <p class="post-date">
              <time datetime="2022-01-01">{{date('F j,Y',strtotime($item->created_at))}}</time>
            </p>
            <h3 class="title">
              <a href="event-details.html">{{$item->title}}</a>
            </h3>
            <p class="event-description">{{$item->desc}}</p>
            <div class="buttons d-grid gap-2">
              <button class="btn btn-primary" type="button">Attend</button>
              <button class="btn btn-primary" type="button">Volunteer</button>
            </div>
          </article>
        </div><!-- End Events Item -->
        @endforeach


      


        <a href="event-details.html" class="btn-large">More Events</a>
      </div>
      
    </div>
  </section><!-- End Events Section -->

  <!-- =======  Projects Section ======= -->
  <section id="projects" class="projects sections-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>Projects</h2>
        <p>{{$description[2]->desc}}</p>
      </div>

      

      <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">
        @php
            $projects = DB::select('SELECT * FROM `projects`');
        @endphp
        @foreach ($projects as $item)
        <div class="col-lg-3 col-md-6">
          <article>
            <div class="post-img">
              <img src="assets/img/blog/blog.jpg" alt="" class="img-fluid">
            </div>
            <p class="post-date">
              <time datetime="2022-01-01">{{date('F j,Y',strtotime($item->created_at))}}</time>
            </p>
            <h3 class="title">
              <a href="blog-details.html">{{$item->title}}</a>
            </h3>
            <p class="project-description">{{$item->desc}}</p>
            <div class="buttons d-grid gap-2">
              <button class="btn btn-primary" type="button">Pledge</button>
              <button class="btn btn-primary" type="button">Volunteer</button>
            </div>
          </article>
        </div><!-- End Projects Item -->
        @endforeach
     

       
       

        <a href="#" class="btn-large">More Projects</a>
      </div>
      
    </div>
  </section><!-- End Projects Section -->


  <!-- ======= Our Team Section ======= -->
  <section id="team" class="team">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>Our Team</h2>
        <p>{{$description[3]->desc}}</p>
      </div>
    
      <div class="row gy-4">
        @php
            $teams = DB::select('SELECT * FROM `teams`');
        @endphp
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
      <div data-aos="fade-up">
        <img src="assets/img/jjc-fam.png" class="jjc-fam-pic" alt="Be part of JJC family">
        <a href="#" class="btn-large">Be a member now</a>
      </div>
    </div>
  </section><!-- End Our Team Section -->

  
  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact sections-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>Contact</h2>
        <p>{{$description[4]->desc}}</p>
      </div>

      <div class="row gx-lg-0 gy-4">

        <div class="col-lg-4">

          <div class="info-container d-flex flex-column align-items-center justify-content-center">
            <div class="info-item d-flex">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h4>Location:</h4>
                <p>{{$contactdetails[0]->location}}</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h4>Email:</h4>
                <p>{{$contactdetails[0]->email}}</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex">
              <i class="bi bi-phone flex-shrink-0"></i>
              <div>
                <h4>Call:</h4>
                <p>{{$contactdetails[0]->phonedetails}}</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex">
              <i class="bi bi-clock flex-shrink-0"></i>
              <div>
                <h4>Open Hours:</h4>
                <p>{{$contactdetails[0]->opendetails}}</p>
              </div>
            </div><!-- End Info Item -->
          </div>

        </div>

        <div class="col-lg-8">
          <form action="{{route('saveMessage')}}" method="post" role="form" class="php-email-form">
            @csrf
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" required class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" required name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" required name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" required name="message" rows="7" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div><!-- End Contact Form -->

      </div>

    </div>
  </section><!-- End Contact Section -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @if(session()->has('successsent'))
  <script>
    Swal.fire(
        'Message Sent!',
        '{{session()->get("successsent")}}',
        'success'
        )
</script>
  @endif

  <!-- ======= Partners Section ======= -->
  
  <section id="partners" class="partners section-bg">
    <div class="container">
      <div class="section-header">
        <h2>Partnership</h2>
      </div>

      <div class="row" data-aos="zoom-out">

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <img src="assets/img/partners/client.png" class="img-fluid" alt="">
        </div>

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <img src="assets/img/partners/client1.png" class="img-fluid" alt="">
        </div>

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <img src="assets/img/partners/client.png" class="img-fluid" alt="">
        </div>

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <img src="assets/img/partners/client1.png" class="img-fluid" alt="">
        </div>

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <img src="assets/img/partners/client.png" class="img-fluid" alt="">
        </div>

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <img src="assets/img/partners/client1.png" class="img-fluid" alt="">
        </div>

      </div>

    </div>
  </section>
  <!-- End Partners Section -->
@endsection

