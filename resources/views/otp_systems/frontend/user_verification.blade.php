@extends('frontend.layouts.app', ['header_show' => false, 'header2' => false, 'footer' => false])

@section('content')
    <div class="login-screen container py-4">
        <div class="row justify-content-center pt-3">
            <div class="col-lg-5 col-md-7 col-sm-8 px-0">

                <div class="logo-div pb-5">
                    <a href="{{ route('home') }}">
                        <img src="{{ static_asset('assets/img/safequ-logo.png') }}" alt="SafeQu Logo">
                    </a>
                </div>

                <form method="post" class="otp-form px-2" action="{{ route('verification.submit') }}">
                    @csrf

                    <h5 class="fw700">Verification Code</h5>
                    <p class="pb-3">Code sent to <span class="otp-to-phone fw600">+91-1234567890</span></p>

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

                    <input type="hidden" name="verification_code" value="">

                    {{-- <p class="mb-4 text-center">Resend code in
                        <span class="otp-timer act-price fw600">0:46</span>
                    </p> --}}

                    <a href="{{ route('verification.phone.resend') }}">
                        <p class="mb-4 text-center act-price fw600">Resend code</p>
                    </a>

                    <button type="submit" class="btn primary-btn btn-block text-white">
                        {{ translate('Verify OTP') }}
                    </button>
                </form>

                <a href="{{ route('user.login') }}">
                    <p class="text-center mt-3 py-2 mb-2"> <i class="fal fa-long-arrow-left"></i> &nbsp;&nbsp; Back to login</p>
                </a>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
