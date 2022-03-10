@extends('frontend.layouts.app', ['header_show' => false, 'header2' => false])

@section('content')
    <div class="login-screen container py-4">
        <div class="row justify-content-center pt-3">
            <div class="col-lg-5 col-md-7 col-sm-8 px-0">

                <div class="logo-div pb-5">
                    <a href="{{ route('home') }}"> <img src="{{ static_asset('assets/img/safequ-logo.png') }}" alt="SafeQu Logo"> </a>
                </div>

                {{-- <form method="post" class="login-form"> --}}
                <form class="login-form">

                    <h5 class="fw700">Login Account</h5>
                    <p class="pb-3">Hello, welcomeback to your account.</p>

                    <input type="text" class="mb-4" name="customer_phone" placeholder="Enter phone number" required
                        onkeyup="this.value = this.value.replace(/[^0-9]/g, '')" />

                    <button type="submit" class="btn primary-btn btn-block">Request Otp</button>

                    <a href="{{ route('home') }}">
                        <p class="text-center pt-3 act-price">Skip for now</p>
                    </a>
                </form>

                {{-- <form method="post" class="otp-form" style="display: none;"> --}}
                <form class="otp-form" style="display: none;">

                    <h5 class="fw700">Varification Code</h5>
                    <p class="pb-3">Code sent to <span class="otp-to-phone fw600">+91-1234567890</span>
                    </p>

                    <div class="form-group mb-4">
                        <input type="text" id="digit-1" name="digit-1" data-next="digit-2" required
                            onkeyup="this.value = this.value.replace(/[^0-9]/g, '')" />
                        <input type="text" id="digit-2" name="digit-2" data-next="digit-3" data-previous="digit-1" required
                            onkeyup="this.value = this.value.replace(/[^0-9]/g, '')" />
                        <input type="text" id="digit-3" name="digit-3" data-next="digit-4" data-previous="digit-2" required
                            onkeyup="this.value = this.value.replace(/[^0-9]/g, '')" />
                        <input type="text" id="digit-4" name="digit-4" data-previous="digit-3" required
                            onkeyup="this.value = this.value.replace(/[^0-9]/g, '')" />
                    </div>

                    <p class="mb-4 text-center">Resend code in
                        <span class="otp-timer act-price fw600">0:46</span>
                    </p>

                    <!-- <button type="submit" class="btn primary-btn btn-block">Verify Otp</button> -->
                    <a href="products.html" class="btn primary-btn btn-block text-white">Verify Otp</a>

                    <a href="#">
                        <p class="text-center pt-3">Need help?</p>
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
