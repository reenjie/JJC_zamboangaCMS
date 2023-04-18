@extends('layouts.homepage')

@section('content')
<main id="main">
  @php
  $description = DB::select('SELECT * FROM `descriptions`');

  $json = file_get_contents(resource_path('json/typeofgoods.json'));
  $data = json_decode($json, true);

  $cjson = file_get_contents(resource_path('json/config.json'));
      $cdata = json_decode($cjson, true);

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
          <form class="row g-3" method="post" action="{{route('saveMembership')}}" enctype="multipart/form-data">
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
              <input type="email" required name="email" class="form-control" placeholder="E-mail" id="email">
              <div class="invalid-feedback">Provided Email is Invalid</div>
            </div>
            <div class="row" id="already">

              @include('forms',["pledge_exempted"=>true])
            </div>
            <div class="card">

              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <h4>Pledge Form</h4>
                    <h6>Type of Donation:</h6>
                  </div>

                  <div class="row mb-4" id="kindof">
                    <div class="col-md-6">
                      <div class="card">
                        <div class="card-body">
                          <h5 style="text-align: center">Cash</h5>
                          <button type="button" class="btn btn-primary px-5 w-100 btnselect" data-types="cash">Select  <i class="fas fa-box-share"></i></button>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="card">
                        <div class="card-body">
                          <h5 style="text-align: center">Goods</h5>
                          <button type="button" class="btn btn-primary px-5 w-100 btnselect" data-types="goods">Select  <i class="fas fa-box-share"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class=" d-none mb-3" id="cash">
                    <div class="col-md-6">
                      <button class="btn btn-dark btn-sm px-3 btnback mb-3" type="button">Back</button>

                      <h6>Pledge Amount</h6>
  
                      <input type="number" class="form-control" name="amount" id="amount" step="0.01" placeholder="0.00">
                      {{-- <span style="font-size:12px;color:maroon">Disregard if donation is Goods</span> --}}
                    </div>
                    <div class="col-md-6 mb-3">
                   
                      <h6>Digital Fund</h6>

                      <h6 class="mt-5">For Gcash only :</h6>
                      <h6 style="text-align: center;">Gcash</h6>
                      <h6 style="text-align: center;">
  
  
                        <img src="https://th.bing.com/th/id/OIP.V_mHor9anWk1oXTi6rNoJAHaHa?pid=ImgDet&rs=1" style="width:200px" alt="">
                      </h6>
                      <input type="file" class="form-control" name="receiptfile" accept="image/*">
                      <span style="font-size: 11px;color:#F45050">Upload Gcash Receipt here ..</span>
                          <h6 style="text-align: center">OR</h6>

                          <h6 class="mt-5">For Paymaya only :</h6>
                      <input type="file" class="form-control mt-4 " name="receiptfile" accept="image/*">
                      <span style="font-size: 11px;color:#F45050">Upload Paymaya Receipt here..</span>
                    </div>
                  </div>
                 
                  <div id="goods" class="d-none mb-3">
                    <div class="col-md-6 mb-2 mt-2">
                      <button class="btn btn-dark btn-sm px-3 btnback mb-3" type="button">Back</button>
                      <h6>Type of Goods</h6>
                      <select name="typeofgoods" class="form-select ekis" id="" required>
                        <option value="">Select Type of Goods</option>
                        @php
  
                        foreach ($data as $item) {
                        echo '<option value="'.$item['name'].'">'.$item['name'].'</option>';
                        }
                        @endphp
  
                      </select>
                    </div>
  
                    <div class="col-md-6 mb-2 mt-2">
                      <h6>Quantity </h6>
                      <input type="number" name="Qty" class="form-control ekis" required>
                    </div>
  
                 
                  </div>
                  <div class="col-md-6 mb-2">
                    <h6>Address pledge to : </h6>
                    <textarea id="" cols="30" required rows="5" name="receiver" placeholder="provide detailed information about the receiver or who you want to give your pledge, the place ,location or organization .." class="form-control"></textarea>
                  </div>
                  <div class="col-md-6 mb-2">
                    <h6>Expected Date to received : </h6>
                    <input type="date" class="form-control" required name="expecteddate" min="<?php echo date('Y-m-d'); ?>">

                  </div>


                  

                </div>
              </div>
            </div>

            <div class="form-buttons mt-4">
              <button type="submit" id="submitbtn" class="btn btn-primary">Submit </button>
            </div>
          </form><!-- End No Labels Form -->


        </div>
      </div>


    </div>
  </section>

  <script>
    $('.btnback').click(function(){
        $('#cash').addClass('d-none');
        $('#goods').addClass('d-none');
        $('#kindof').removeClass('d-none');
    })
    $('.btnselect').click(function(){
      var types = $(this).data('types');
      if(types == 'cash'){
        $('#cash').removeClass('d-none');
        $('#goods').addClass('d-none');
        $('#kindof').addClass('d-none');
      }

      if(types == 'goods'){
        $('#cash').addClass('d-none');
        $('#goods').removeClass('d-none');
        $('#kindof').addClass('d-none');

      }
    })
    $('#email').keyup(function() {
      var email = $(this).val();
      var pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (pattern.test(email)) {

        $('#submitbtn').removeAttr('disabled');
        $(this).removeClass('is-invalid').addClass('is-valid');
      } else {
        $(this).addClass('is-invalid').removeClass('is-valid');
        $('#submitbtn').attr('disabled', true);

      }
    })
    $('#date-of-birth').change(function() {
      var dob = new Date($(this).val());
      var today = new Date();
      var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
      $('#age').val(age);
    })
  </script>
</main><!-- End #main -->

<script>
  $('#customCheck1').click((function() {
    if ($(this).prop('checked') == true) {
      $('#already').addClass('d-none');
      $('.ekis').removeAttr('required');
      $('#check').val('update');
    } else {
      $('#already').removeClass('d-none');
      $('.ekis').attr('required', true);
      $('#check').val('addwpledge');
    }
  }))
</script>
@endsection