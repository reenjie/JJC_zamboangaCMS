@extends('layouts.app', ['activePage' => 'login', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION'])

@section('content')
<div class="full-page section-image" data-color="black" data-image="{{asset('light-bootstrap/img/full-screen-image-2.jpg')}}">
    <div class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <a href="{{route('login')}}" style="font-size:14px;text-decoration:underline">
                        <i class="fas fa-arrow-left"></i> Back to Login</a>
                    @if(session()->has('emailsend'))

                    <form method="POST" action="{{ route('confirmcode') }}">
                        @csrf
                        <div class="card card-hidden">


                            <div class="card-header">{{ __('Confirm Code') }}</div>



                            <div class="card-body">
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">

                                    Reset code sent successfully!

                                </div>
                                <div class="form-group text-center">


                                    <label for="email" class="col-md-4 col-form-label ">{{ __('RESET CODE') }}</label>


                                    <div class="col-md-12">
                                        <input id="email" type="code" style="text-align: center;" class="form-control @if(session()->has('error'))
                                    is-invalid
                                    @endif" name="resetcode" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        <div class="invalid-feedback">Invalid Code</div>

                                    </div>
                                </div>

                                <div class="form-group row mb-0 d-flex justify-content-center">
                                    <div class="offset-md-4">
                                        <button type="submit" class="btn btn-primary btn-wd">
                                            {{ __('SUBMIT') }}
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>


                    @elseif(session()->has('codematch'))


                    <form method="POST" action="{{ route('changepass') }}">
                        @csrf
                        <div class="card card-hidden">


                            <div class="card-header">{{ __('Change Password') }}</div>



                            <div class="card-body">

                                <div class="form-group text-center">


                                    <label for="email" class="col-md-4 col-form-label ">{{ __('New Password') }}</label>


                                    <div class="col-md-12">
                                        <input type="password" style="text-align: center;" class="form-control xx @if(session()->has('error'))
                                    is-invalid
                                    @endif" name="password" value="{{ old('email') }}" id="np" required autocomplete="email" autofocus>


                                    </div>

                                    <label for="email" class="col-md-4 col-form-label ">{{ __('Confirm Password') }}</label>
                                    <div class="col-md-12">
                                        <input type="password" id="cp" style="text-align: center;" class="form-control xx @if(session()->has('error'))
                                    is-invalid
                                    @endif" name="confirmpass" value="{{ old('email') }}" required autocomplete="email" disabled>


                                    </div>
                                    <input type="checkbox" id="check">
                                    <label for="check">Show Password</label>
                                </div>


                                <div class="form-group row mb-0 d-flex justify-content-center">
                                    <div class="offset-md-4">
                                        <button type="submit" class="btn btn-primary btn-wd" id="submit" disabled>
                                            {{ __('SUBMIT') }}
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                    <script>
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
                    </script>

                    @else
                    <form method="POST" action="{{ route('mailResetcode') }}">
                        @csrf
                        <div class="card card-hidden">


                            <div class="card-header">{{ __('Reset Password') }}</div>



                            <div class="card-body">
                                @include('alerts.success')
                                @if(session()->has('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{session()->get('error')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @enderror
                                <div class="form-group text-center">
                                    <label for="email" class="col-md-4 col-form-label ">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-12">
                                        <input id="email" type="email" style="text-align: center;" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <spa<strong>{{ $message }}</strong>
                                            </spn class="invalid-feedback" role="alert">
                                            an>
                                            @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0 d-flex justify-content-center">
                                    <div class="offset-md-4">
                                        <button type="submit" class="btn btn-primary btn-wd">
                                            {{ __('Send Password Reset Code') }}
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>

                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>
@endpush