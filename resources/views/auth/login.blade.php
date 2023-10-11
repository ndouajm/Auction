@extends('users.layouts.users')

@section('section')

<div class="inner-banner">
    <div class="container">
        <h2 class="inner-banner-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">Log In</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Log In</li>
            </ol>
        </nav>
    </div>
</div>
<div class="login-section pt-120 pb-120">
    <img alt="imges" src="{{ asset('users/assets/images/bg/section-bg.png') }}" class="img-fluid section-bg-top">
    <img alt="imges" src="{{ asset('users/assets/images/bg/section-bg.png') }}" class="img-fluid section-bg-bottom">
    <div class="container">
        <div class="row d-flex justify-content-center g-4">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="form-wrapper wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".2s">
                    <div class="form-title">
                        <h3>Log In</h3>
                        <p>New Member? <a href="{{ route('register') }}">signup here</a></p>
                    </div>
                    <form class="w-100" action="{{ route('login') }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-inner">
                                    <label>Enter Your Email *</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-inner">
                                    <label>Password *</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-agreement form-inner d-flex justify-content-between flex-wrap">
                                    <div class="form-group">
                                        <input type="checkbox" id="html">
                                        <label for="html">I agree to the <a href="#">Terms & Policy</a></label>
                                    </div>
                                    <a href="#" class="forgot-pass">Forgotten Password</a>
                                </div>

                            </div>
                        </div>
                        <button class="account-btn">Log in</button>
                    </form>
                    <div class="alternate-signup-box">
                        <h6>or signup WITH</h6>
                        <div class="btn-group gap-4">
                            <a href class="eg-btn google-btn d-flex align-items-center"><i
                                    class="bx bxl-google"></i><span>signup whit google</span></a>
                            <a href class="eg-btn facebook-btn d-flex align-items-center"><i
                                    class="bx bxl-facebook"></i>signup whit facebook</a>
                        </div>
                    </div>
                    <div class="form-poicy-area">
                        <p>By clicking the "signup" button, you create a Cobiro account, and you agree to Cobiro's
                            <a href="#">Terms & Conditions</a> & <a href="#">Privacy Policy.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
