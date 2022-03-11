@extends('frontend.layouts.app', ['header_show' => true, 'header2' => false, 'footer' => true])

@section('content')

    <header class="inner-header bg-white py-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-sm-8 px-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <a class="nav-logo" href="javascript:history.back()">
                            <i class="fad fa-chevron-left pl-2 pr-3 py-2"></i>
                        </a>
                        <a class="nav-logo" href="{{ route('home')}}">
                            <img src="{{ static_asset('assets/img/safequ-logo.png') }}" alt="SafeQu Logo">
                        </a>
                        <div class="empty-nav-div"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="main-tag-mt-sm">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6 col-sm-8 px-2 py-4">
                    <div class="profile-img">
                        <img src="{{ static_asset('assets/img/user-4.webp') }}" alt="User Img">
                        <div class="cmr-btn flex-acenter-jcenter">
                            <i class="fad fa-camera-alt text-white"></i>
                        </div>
                    </div>

                    <form method="post" id="userProfileForm" class="py-4">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" />
                        </div>
                        <div class="form-group">
                            <label for="phone">Mobile numbar</label>
                            <input type="text" name="phone" id="phone" />
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea rows="3" name="address" id="address"></textarea>
                        </div>
                        <div class="row">
                            <div class="form-group col-6 pl-0 pr-1">
                                <label for="city">City</label>
                                <input type="text" name="city" id="city" />
                            </div>
                            <div class="form-group col-6 pr-0 pl-1">
                                <label for="state">State</label>
                                <input type="text" name="state" id="state" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" name="password" id="password" />
                        </div>

                        <button class="btn primary-btn mt-4 btn-block">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('modal')
    @include('frontend.partials.address_modal')
@endsection

@section('script')
@endsection
