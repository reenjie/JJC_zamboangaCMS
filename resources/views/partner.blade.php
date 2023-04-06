@extends('layouts.homepage')

@section('content')
<main id="main">
  @php
      $description = DB::select('SELECT * FROM `descriptions`');
  @endphp
  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Partnership Form</h2>
              <p>{{$description[8]->desc}}</p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Partnership Form</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <section class="membership-page">
      <div class="container" data-aos="fade-up">
          @if(session()->has('success'))
          <script>
            Swal.fire(
                'Success!',
                '{{session()->get("success")}}',
                'success'
                )
       </script>
          @endif

          @if(session()->has('error'))
       <script>
            Swal.fire(
                'Error',
                '{{session()->get("error")}}',
                'error'
                )
       </script>
        @endif
          <div class="card">
              <div class="card-body">

                <h5 class="card-title mb-4">Personal Information</h5>
      
                <!-- No Labels Form -->
                <form class="row g-3" method="post" action="{{route('saveMembership')}}" >
                  @csrf

                    
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="customCheck1">
                    <label class="form-check-label" for="flexCheckDefault">
                        I am a Member
                    </label>
                  </div>

                  <input type="hidden" name="check" value="addpartnership" id="check">
                  <div class="col-md-12">
                    <label for="first-name" class="form-label">Email</label>
                    <input type="email" required name="email" class="form-control" placeholder="Email" id="first-name">
                </div>
                    <div class="row" id="already">
                       
                          <div class="col-md-4">
                              <label for="first-name" class="form-label">First Name</label>
                              <input type="text" required name="fname" class="ekis form-control" placeholder="First Name" id="first-name">
                          </div>
                          <div class="col-md-4">
                              <label for="last-name" class="form-label">Last Name</label>
                              <input type="text" required name="lname" class="ekis form-control" placeholder="Last Name" id="last-name">
                          </div>
                          <div class="col-md-4">
                              <label for="middle-name" class="form-label">Middle Name</label>
                              <input type="text" required name="mname" class="ekis form-control" placeholder="Middle Name" id="middle-name">
                          </div>
                          <div class="col-md-2">
                              <label for="date-of-birth" class="form-label">Date of Birth</label>
                              <input type="date" name="dob" required class="ekis form-control" id="date-of-birth">
                          </div>
                          <div class="col-md-2">
                              <label for="gender" class="form-label">Gender</label>
                              <select id="gender" required name="gender" class="ekis form-select">
                                <option selected>Choose...</option>
                                <option>Male</option>
                                <option>Female</option>
                              </select>
                          </div>
                          <div class="col-md-2">
                              <label for="marital-status" class="form-label">Marital Status</label>
                              <select id="marital-status" required name="status" class="ekis form-select">
                                <option selected>Choose...</option>
                                <option>Single</option>
                                <option>Married</option>
                              </select>
                          </div>
                          <div class="col-md-2">
                              <label for="religion" class="form-label">Religion</label>
                              <select id="religion" required name="religion" class="ekis form-select">
                                <option selected>Choose...</option>
                                <option>Roman Catholic</option>
                                <option>...</option>
                              </select>
                          </div>
                          <div class="col-md-2">
                            <label for="age" class="form-label">Age</label>
                            <select id="age" required name="age" class="form-select ekis">
                              <option selected>Choose...</option>
                              @for($i = 15; $i <= 24; $i++)
                              <option value="{{$i}}">{{$i}}</option>
                              @endfor
                            </select>
                          </div>
        
                          <div class="col-md-4">
                              <label for="place-of-birth" class="form-label">Place of Birth</label>
                              <input type="text" name="pob" required class="form-control ekis" placeholder="Place of Birth" id="place-of-birth">
                          </div>
                          <label class="form-label">Permanent Address</label>
                          <div class="col-md-3">
                              <label for="street" class="form-label">Prk/Street/Building No.</label>
                              <input type="text" required name="ad1" class="form-control ekis" placeholder="Prk/Street/Building No." id="street">
                          </div>
                          <div class="col-md-3">
                              <label for="barangay" class="form-label">Barangay </label>
                              <input type="text" required name="ad2" class="form-control ekis" placeholder="Barangay" id="barangay">
                          </div>
                          <div class="col-md-3">
                              <label for="city" class="form-label">City</label>
                              <input type="text" required name="ad3" class="form-control ekis" placeholder="City" id="city">
                          </div>
                          <div class="col-md-3">
                              <label for="region" class="form-label">Region</label>
                              <input type="text" required name="ad4" class="form-control ekis" placeholder="Region" id="region">
                          </div>
        
                          <div class="col-md-3">
                            <label for="contact-number" class="form-label">Contact Number</label>
                            <input type="text" name="contact" class="form-control ekis" placeholder="Contact Number" id="contact-number">
                          </div>
                        
                          <div class="col-md-6">
                            <label for="contact-address" class="form-label">Contact Address</label>
                            <input type="text" name="contactadd" class="form-control ekis" placeholder="Contact Address" id="contact-address">
                        </div>
                          <label class="form-label">Social Media (optional)</label>
                          <div class="col-md-3">
                              <label for="fb-name" class="form-label">Facebook Name</label>
                              <input type="text" name="facebook" class="form-control ekis" placeholder="Facebook Name" id="fb-name">
                          </div>
                          <div class="col-md-3">
                            <label for="twitter-name" class="form-label">Twitter Name</label>
                            <input type="text" name="twitter" class="form-control ekis" placeholder="Twitter Name" id="twitter-name">
                          </div>
                          <div class="col-md-3">
                            <label for="instagram-name" class="form-label">Instagram Name</label>
                            <input type="text" name="instagram" class="form-control ekis" placeholder="Instagram Name" id="instagram-name">
                          </div>
                          <div class="col-md-3">
                            <label for="linkedin-name" class="form-label">Linkedin Name</label>
                            <input type="text" name="linkedin" class="form-control ekis" placeholder="Linked Name" id="linkedin-name">
                          </div>
        
                    </div>
                  <div class="card">

                    <div class="card-body">
                     <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="parts" value="1">
                          <button type="submit" class="btn btn-primary">Partner With Us!</button>
                        </div>
                       
                     </div>
                    </div>
                  </div>

               
                </form><!-- End No Labels Form -->
                
      
              </div>
            </div>
  

      </div>
    </section>


</main><!-- End #main -->

    <script>
        $('#customCheck1').click((function(){
            if($(this).prop('checked')== true){
               $('#already').addClass('d-none');
               $('.ekis').removeAttr('required');
               $('#check').val('update');
            }else{
                $('#already').removeClass('d-none');
                $('.ekis').attr('required',true);
                $('#check').val('addvolunteer');
            }
        }))
    </script>
@endsection