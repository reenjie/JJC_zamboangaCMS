@extends('layouts.homepage')

@section('content')
<main id="main">
  @php
      $description = DB::select('SELECT * FROM `descriptions`');
      $cjson = file_get_contents(resource_path('json/config.json'));
      $cdata = json_decode($cjson, true);
  @endphp
  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Membership Form</h2>
              <p>{{$description[5]->desc}}</p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Membership Form</li>
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



         
          
          <div class="card">
              <div class="card-body">

                <h5 class="card-title mb-4">Personal Information</h5>
      
                <!-- No Labels Form -->
                <form class="row g-3" method="post" action="{{route('saveMembership')}}" >
                  @csrf
                  <input type="hidden" name="check" value="add" id="check">
                  <div class="col-md-12">
                    <label for="first-name" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" required name="email" class="form-control"  placeholder="E-mail" id="email">
                    <div class="invalid-feedback">Provided Email is Invalid</div>
                </div>
                 @include('forms')
                  <div class="form-buttons mt-4">
                    <button type="submit" id="submitbtn"  disabled  class="btn btn-primary">Submit </button>
                  </div>
                </form><!-- End No Labels Form -->
                
      
              </div>
            </div>
  

      </div>
    </section>

    <script>
     $('#email').keyup(function(){
    var email = $(this).val();
    var pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; 
    if (pattern.test(email)) {
    
       $('#submitbtn').removeAttr('disabled');
    $(this).removeClass('is-invalid').addClass('is-valid');
    } else {
    $(this).addClass('is-invalid').removeClass('is-valid');
    $('#submitbtn').attr('disabled',true);
      
    }
})
   $('#date-of-birth').change(function(){
  var dob = new Date($(this).val());
  var today = new Date();
  var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
  $('#age').val(age);
})
    </script>

</main><!-- End #main -->

@endsection