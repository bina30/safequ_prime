@extends('frontend.layouts.app', ['header_show' => false, 'header2' => false, 'footer' => true])

@section('content')
    <div class="login-screen container py-4">
        <div class="row justify-content-center pt-3">
            <div class="col-lg-5 col-md-7 col-sm-8 px-0">

                <div class="logo-div pb-5">
                    <a href="{{ route('home') }}"> <img src="{{ static_asset('assets/img/safequ-logo.png') }}" alt="SafeQu Logo"> </a>
                </div>

                <form method="post" class="login-form">

                    <h5 class="fw700">Login Account</h5>
                    <p class="pb-3">Hello, welcomeback to your account.</p>

                    <input type="text" class="mb-4" name="customer_phone" placeholder="Enter phone number" required
                        onkeyup="this.value = this.value.replace(/[^0-9]/g, '')" />

                    <button type="submit" class="btn primary-btn btn-block">Request Otp</button>

                    <a href="{{ route('home') }}">
                        <p class="text-center pt-3 act-price">Skip for now</p>
                    </a>
                </form>
                
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
