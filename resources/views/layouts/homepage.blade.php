<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>JJC Zamboanga</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,700;1,800&display=swap" rel="stylesheet">
 
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

</head>

<body>
  <main id="main">

  <!-- ======= Header ======= -->
  @php
      $contactdetails = DB::select('SELECT * FROM `contactdetails`');
      $headers = DB::select('SELECT * FROM `headers`');
      $aboutus = DB::select('SELECT * FROM `aboutuses`');
      $description = DB::select('SELECT * FROM `descriptions`');
   
  @endphp
  
  <section id="topbar" class="topbar d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">{{$contactdetails[0]->email}}</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>{{$contactdetails[0]->phonedetails}}</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="{{$contactdetails[0]->facebook}}" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="{{$contactdetails[0]->twitter}}" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="{{$contactdetails[0]->instagram}}" class="instagram"><i class="bi bi-instagram"></i></a>
      </div>
    </div>
  </section><!-- End Top Bar -->

  <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="/" class="logo d-flex align-items-center">
        <img src="assets/img/jjc-logo.png" alt="logo"> 
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="/">HOME</a></li>
          <li><a href="#about">ABOUT US</a></li>
          <li><a href="#recent-posts">BLOG</a></li>
          <li><a href="#events">EVENTS</a></li>
          <li><a href="#projects">PROJECTS</a></li>
          <li><a href="#team">TEAM</a></li>
          <li><a href="#contact">CONTACT</a></li>
          <li><a href="/login"><i class="bi bi-arrow-bar-right" style="font-size:20px"></i></a></li>
        </ul>
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->

  @yield('content')


    @php
        $footers = DB::select('SELECT * FROM `footers`');
    @endphp
    <form action="{{route('subscribe')}}" method="post">
      @csrf
        <!-- ======= subscribe Section ======= -->
    <div class="subscribe">
      <h2 class="subscribe-title">{!!$footers[0]->p1!!}</h2>
      <p class="subscribe-desciption">{!!$footers[0]->p2!!}</p>
      <div class="form">
        <input type="email" class="subcribe-email" name="email" placeholder="Enter your email address" />
        <button class="subcribe-button">Subscribe</button>
      </div>
      <div class="notice">
        <input type="checkbox" required>
        <span class="notice-desciption">I agree to my email address being stored and uses to recieve monthly newsletter.</span>
      </div>
    </div> <!-- =======End subscribe Section ======= -->
    </form>

  </main><!-- End #main -->



  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-info">
          
          <a class="logo d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#login ">
            <img src="assets/img/jjc-logo.png" alt="admin">
          </a>
          <!-- ======= Main Modal ======= -->
          <!-- ==== Login Modal ==== -->
          <div class="modal fade login" id="login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="login-label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="login-label"><img src="assets/img/jjc-logo.png" width="20%"alt="JJC logo"></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('login') }}" method="post">@csrf
                <div class="modal-body row g-3">
                  <div class="pt-2 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Admin Login</h5>
                    <div class="text-center small">Enter your email & password to login</div>
                  </div>

                  <div class="col-12 login-form-label">
                    <label for="yourEmail" class="form-label">Email</label>
                    <div class="input-group">
                      <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="yourEmail" required value="{{ old('email') }}">
                     
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                    </div>
                 
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="yourPassword" required>
                  
                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                  </div>

                  <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      
                        <span class="forgotPassword" ><a href="#" data-bs-target="#forgotPassword" data-bs-toggle="modal" data-bs-dismiss="modal">Forgot Password?</a></span>
                      </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-primary w-100" type="submit"> Login</button>
                </div>
              </form>
              </div>
            </div>
          </div><!-- End Login Modal -->
          <!-- ==== forgotPassword Modal ==== -->
          <div class="modal fade forgotPassword" id="forgotPassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="forgotPassword-label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="forgotPassword-label"><img src="assets/img/jjc-logo.png" width="20%"alt="JJC logo"></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row g-3">
                  <div class="pt-2 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Reset Password</h5>
                    <div class="text-center small">Enter the code that was sent to exampleemail123@gmail.com. <br> If you can't find the message in your inbox, please check your spam folder.</div>
                  </div>

                  <div class="col-12 forgotPassword-form-label">
                    <label for="yourCode" class="form-label">Code</label>
                    <div class="input-group">
                      <input type="text" name="code" class="form-control" id="yourCode" required>
                      <div class="invalid-feedback">Incorrect Code!</div>
                    </div>
                  </div>

                </div>
                <div class="modal-footer">
                  <button class="btn btn-primary w-100" type="submit">Send Code</button>
                </div>
              </div>
            </div>
          </div><!-- End forgotPassword Modal -->
          <!-- ==== Send Code Modal ==== -->
          <div class="modal fade forgotPassword" id="forgotPassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="forgotPassword-label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="forgotPassword-label"><img src="assets/img/jjc-logo.png" width="20%"alt="JJC logo"></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row g-3">
                  <div class="pt-2 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Reset Password</h5>
                    <div class="text-center small">Enter the code that was sent to exampleemail123@gmail.com. <br> If you can't find the message in your inbox, please check your spam folder.</div>
                  </div>

                  <div class="col-12 forgotPassword-form-label">
                    <label for="yourCode" class="form-label">Code</label>
                    <div class="input-group">
                      <input type="text" name="code" class="form-control" id="yourCode" required>
                      <div class="invalid-feedback">Incorrect Code!</div>
                    </div>
                  </div>

                </div>
                <div class="modal-footer">
                  <button class="btn btn-primary w-100" type="submit">Send Code</button>
                </div>
              </div>
            </div>
          </div> <!-- End Send Code Modal -->
          <!-- End Main Modal -->
          <p>{!!$footers[0]->desc!!}</p>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Social Media</h4>
          <ul>
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">instagram</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Partners</h4>
          <ul>
            <li><a href="#">Google</a></li>
            <li><a href="#">Meta</a></li>
            <li><a href="#">Google</a></li>
            <li><a href="#">Meta</a></li>
            <li><a href="#">Google</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contact Us</h4>
          <p>
            <strong>Location:</strong> <br>
            {!!$contactdetails[0]->location!!}<br>
            <strong>Phone:</strong> <br> {!!$contactdetails[0]->phonedetails!!}<br>
            <strong>Email:</strong> <br>{!!$contactdetails[0]->email!!}<br>
          </p>
        </div>

      </div>
    </div>
    <hr>
    <div class="container mt-4">
      <div class="copyright">
         All Rights Reserved by &copy; <strong><span>JJC Zamboanga</span></strong>. 
      </div>
    </div>

  </footer><!-- End Footer -->
  <!-- End Footer -->


  <!-- Button trigger modal -->


  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>
  
  @if(session()->has('success'))
  <script>
      Swal.fire(
        'Subscribed Successfully!',
        '{{session()->get("success")}}',
        'success'
        )
  </script>
  @endif

  @if(session()->has('duplicate'))
  <script>
      Swal.fire(
        'Thank you!',
        '{{session()->get("duplicate")}}',
        'success'
        )
  </script>
  @endif
  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>