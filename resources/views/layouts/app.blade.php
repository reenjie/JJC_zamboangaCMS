<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('light-bootstrap/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('light-bootstrap/img/favicon.ico') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>JJC Zamboanga</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
  <!-- CSS Files -->
  <link href="{{ asset('light-bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('light-bootstrap/css/light-bootstrap-dashboard.css?v=2.1.0') }} ?v=1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('light-bootstrap/css/demo.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor5/37.0.1/ckeditor.min.js" integrity="sha512-u1sLXXwUefvooLCurgZpkZnSlf4Q3DJ4hIzrpB4mXFdbKsGbcekHI1x2G+ZDSVPj1r2wGnW+takK8AcAVDlqfQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
  <div class="wrapper @if (!auth()->check() || request()->route()->getName() == "") wrapper-full-page @endif">

    @if (auth()->check() && request()->route()->getName() != "")
    @include('layouts.navbars.sidebar')
    <!--    @include('pages/sidebarstyle') -->
    @endif

    <div class="@if (auth()->check() && request()->route()->getName() != "") main-panel @endif">
      @include('layouts.navbars.navbar')
      @yield('content')
      @if(Auth::check())
      @if(Auth::user()->fl == '')
   
      <div class="modal fade" id="changepass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
          
            </div>
            <div class="modal-body">
              <h6 class="text-danger">This might be your first login, Please change your password.</h6>

              <form method="POST" action="{{ route('changepass') }}">
                @csrf
             

                        <div class="form-group text-center">


                            <label for="email" class="col-md-4 col-form-label " style="font-size: 13px">{{ __('New Password') }}</label>


                            <div class="col-md-12">
                                <input type="password" style="text-align: center;" class="form-control xx @if(session()->has('error'))
                            is-invalid
                            @endif" name="password" value="{{ old('email') }}" id="np" required autocomplete="email" autofocus>


                            </div>

                            <label for="email" class="col-md-4 col-form-label " style="font-size: 13px">{{ __('Confirm Password') }}</label>
                            <div class="col-md-12">
                                <input type="password" id="cp" style="text-align: center;" class="form-control xx @if(session()->has('error'))
                            is-invalid
                            @endif" name="confirmpass" value="{{ old('email') }}" required autocomplete="email" disabled>


                            </div>
                            <input type="checkbox" id="check">
                            <label style="font-size: 13px" for="check">Show Password</label>
                        </div>


                        <div class="form-group row mb-0 d-flex justify-content-center">
                            <div class="offset-md-4">
                                <button type="submit" class="btn btn-primary btn-wd" id="submit" disabled>
                                    {{ __('SUBMIT') }}
                                </button>
                            </div>
                        </div>

            </form>
            </div>
            <div class="modal-footer">
              <!-- Add your custom footer buttons here -->
            </div>
          </div>
        </div>
      </div>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script>
      $(document).ready(function(){
        $('#changepass').modal('show');
        $('#check').click(function() {
                            if ($(this).prop('checked') == true) {
                                $('.xx').attr('type', 'text');
                            } else {
                                $('.xx').attr('type', 'password');
                            }
                        })

                        $('#np').keyup(function() {
                            if ($(this).val() == '') {
                                $('#cp').attr('disabled', true);
                                $('#cp').val('');
                                $('#submit').attr('disabled', true);

                            } else if ($('#cp').val()) {

                                if ($('#np').val() == $('#cp').val()) {
                                    $('#submit').attr('disabled', true);
                                }
                            } else {
                                $('#cp').removeAttr('disabled');
                            }


                        })

                        $('#cp').keyup(function() {
                            var np = $('#np').val();
                            var cp = $(this).val();

                            if (np == '') {
                                $(this).attr('disabled', true)
                                $(this).val('');
                                $('#submit').attr('disabled', true);
                            } else

                            if (np == cp) {
                                $('#submit').removeAttr('disabled');
                            } else {
                                $('#submit').attr('disabled', true);
                            }
                        })
      })
  
     </script>
     @endif
   @endif
      @include('layouts.footer.nav')
    </div>

  </div>

        


</body>
<!--   Core JS Files   -->
<script src="{{ asset('light-bootstrap/js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('light-bootstrap/js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('light-bootstrap/js/core/bootstrap.min.js') }}" type="text/javascript"></script>


<script src="{{ asset('light-bootstrap/js/plugins/jquery.sharrre.js') }}"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{ asset('light-bootstrap/js/plugins/bootstrap-switch.js') }}"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="{{ asset('light-bootstrap/js/plugins/chartist.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('light-bootstrap/js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="{{ asset('light-bootstrap/js/light-bootstrap-dashboard.js?v=2.0.0') }}" type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('light-bootstrap/js/demo.js') }}"></script>
<link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet" />
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>
@stack('js')
<script>
  $(document).ready(function() {

    $('#facebook').sharrre({
      share: {
        facebook: true
      },
      enableHover: false,
      enableTracking: false,
      enableCounter: false,
      click: function(api, options) {
        api.simulateClick();
        api.openPopup('facebook');
      },
      template: '<i class="fab fa-facebook-f"></i> Facebook',
      url: 'https://light-bootstrap-dashboard-laravel.creative-tim.com/login'
    });

    $('#google').sharrre({
      share: {
        googlePlus: true
      },
      enableCounter: false,
      enableHover: false,
      enableTracking: true,
      click: function(api, options) {
        api.simulateClick();
        api.openPopup('googlePlus');
      },
      template: '<i class="fab fa-google-plus"></i> Google',
      url: 'https://light-bootstrap-dashboard-laravel.creative-tim.com/login'
    });

    $('#twitter').sharrre({
      share: {
        twitter: true
      },
      enableHover: false,
      enableTracking: false,
      enableCounter: false,
      buttons: {
        twitter: {
          via: 'CreativeTim'
        }
      },
      click: function(api, options) {
        api.simulateClick();
        api.openPopup('twitter');
      },
      template: '<i class="fab fa-twitter"></i> Twitter',
      url: 'https://light-bootstrap-dashboard-laravel.creative-tim.com/login'
    });
  });
</script>

</html>