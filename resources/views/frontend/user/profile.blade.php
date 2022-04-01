@extends('frontend.layouts.app',['header_show' => true, 'header2' => false, 'footer' => true])

@section('content')
    <main class="main-tag-mt-sm">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6 col-sm-8 px-2 pt-3 pb-4">

                    <h5 class="fw600 text-center mb-4">
                        Hello, {{ Auth::user()->name != 'Guest User' ? Auth::user()->name : 'User' }}
                    </h5>

                    <form id="userProfileForm" action="{{ route('user.profile.update') }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="profile-img mb-4">
                            <img src="{{ Auth::user()->avatar_original }}" alt="User Img"
                                 onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-default.webp') }}'"
                                 id="userProfileImage">

                            <div class="cmr-btn flex-acenter-jcenter" data-toggle="aizuploader" data-type="image">
                                <i class="fad fa-camera-alt text-white"></i>
                                <input type="hidden" class="selected-files" name="photo" id="userAvatar"
                                       value="{{ Auth::user()->avatar_original }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" onkeyup="validate_name();"
                                   value="{{ Auth::user()->name == 'Guest User' ? '' : Auth::user()->name }}" required/>
                        </div>
                        <div class="form-group">
                            <label for="phone-code">Mobile number</label>
                            <input type="text" name="phone" id="phone-code" value="{{ Auth::user()->phone }}" required
                                   disabled/>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" required/>
                        </div>
                        <div class="form-group">
                            <label for="address">Flat / House No.</label>
                            <input type="text" name="address" id="address" value="{{ Auth::user()->address }}" required/>
                        </div>
                        <div class="row">
                            <div class="form-group col-6 pl-0 pr-1">
                                <label for="city">City</label>
                                <input type="text" name="city" id="city" value="{{ Auth::user()->city }}" required/>
                            </div>
                            <div class="form-group col-6 pr-0 pl-1">
                                <label for="state">State</label>
                                <input type="text" name="state" id="state" value="{{ Auth::user()->state }}" required/>
                            </div>
                            <div class="form-group col-6 pl-0 pr-1">
                                <label for="country">Country</label>
                                <input type="text" name="country" id="country"
                                       value="{{ Auth::user()->country ?? 'India' }}" required/>
                            </div>
                            <div class="form-group col-6 pr-0 pl-1">
                                <label for="postal_code">Postal code</label>
                                <input type="text" name="postal_code" id="postal_code"
                                       value="{{ Auth::user()->postal_code }}" required/>
                            </div>
                        </div>

                        <button type="submit" class="btn primary-btn mt-4 btn-block">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('modal')
    @include('frontend.partials.address_modal')
@endsection

<script>
    function validate_name(){
        let element = document.getElementById('name');
        element.value = element.value.replace(/[^a-zA-Z\s@]+/, '');
    }
</script>
@section('script')
@endsection
