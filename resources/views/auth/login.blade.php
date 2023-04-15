@extends('layouts/app', ['activePage' => 'login', 'title' => 'JJC Zamboanga'])

@section('content')
<div class="full-page section-image" data-color="black" data-image="{{ asset('light-bootstrap/img/full-screen-image-2.jpg') }}">
    <div class="content pt-5">
        <div class="container mt-5">
            <div class="col-md-4 col-sm-6 ml-auto mr-auto">
                <form class="form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="card card-login card-hidden">
                        <div class="card-header ">
                            <a href="/">
                                <h6 class="header text-center"> <img src="assets/img/jjc-logo.png" style="width: 200px" alt=""></h6>
                            </a>

                        </div>
                        <div class="card-body ">
                            <div class="card-body">
                                {{session()->forget('emailsend')}}

                                @if(session()->has('success'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    {{session()->get('success')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                                <div class="form-group">


                                    <label for="email" class="col-md-6 col-form-label">{{ __('E-Mail ') }}</label>

                                    <div class="col-md-14">

                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Invalid Email or Password please try again</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="col-md-6 col-form-label">{{ __('Password') }}</label>

                                        <div class="col-md-14">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="current-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <label class="form-check-label d-flex align-items-center">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                                <span class="form-check-sign"></span>
                                                {{ __('Remember me') }}
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <a href="{{route('password.request')}}" style="font-size: 13px;">Forgot password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <div class="container text-center">
                                <button type="submit" class="form-control btn btn-primary  text-primary">{{ __('LOGIN') }}</button>
                            </div>
                            <div class="d-flex justify-content-between">
                                {{-- <a class="btn btn-link"  style="color:#23CCEF" href="{{ route('password.request') }}">
                                {{ __('Forgot password?') }}
                                </a>
                                <a class="btn btn-link" style="color:#23CCEF" href="{{ route('register') }}">
                                    {{ __('Create account') }}
                                </a> --}}
                            </div>

                        </div>
                    </div>
            </div>
            </form>
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