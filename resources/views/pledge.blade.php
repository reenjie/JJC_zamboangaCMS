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
              <h2>Pledge Form</h2>
              <p>{{$description[6]->desc}}</p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Pledge Form</li>
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

                  <input type="hidden" name="check" value="addwpledge" id="check">
                  <div class="col-md-12">
                    <label for="first-name" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" required name="email" class="form-control"  placeholder="E-mail" id="email">
                    <div class="invalid-feedback">Provided Email is Invalid</div>
                </div>
                    <div class="row" id="already">
                       
                       @include('forms')
                    </div>
                  <div class="card">

                    <div class="card-body">
                     <div class="row">"
                        <div class="col-md-6>
                            <h4>Pledge Form</h4>
                            <h6>Type of Donation:</h6>

                            <h6>Pledge Amount</h6>
                            <input type="number" class="form-control"  name="amount">
                            <span style="font-size:12px;color:maroon">Disregard if donation is Goods</span>
                        </div>
                        <div class="col-md-6"></div>

                        <div class="col-md-6 mb-2 mt-2">
                            <h6>Type of Goods</h6>
                            <input type="text" name="typeofgoods" class="form-control">
                        </div>

                        <div class="col-md-6 mb-2 mt-2">
                            <h6>Quantity </h6>
                            <input type="number" name="Qty" class="form-control" >
                        </div>

                        <div class="col-md-12 mb-2">
                            <h6>Notes : </h6>
                           <textarea name="notes" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                      
                        
                     </div>
                    </div>
                  </div>

                  <div class="form-buttons mt-4">
                    <button type="submit" id="submitbtn"  class="btn btn-primary">Submit </button>
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

    <script>
        $('#customCheck1').click((function(){
            if($(this).prop('checked')== true){
               $('#already').addClass('d-none');
               $('.ekis').removeAttr('required');
               $('#check').val('update');
            }else{
                $('#already').removeClass('d-none');
                $('.ekis').attr('required',true);
                $('#check').val('addwpledge');
            }
        }))
    </script>
@endsection