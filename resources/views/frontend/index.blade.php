@extends('frontend.layouts.app',['lightNav'=> true , 'header_show' => true, 'header2' => false, 'footer' => true])

@section('content')
    <main>
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">

                    <div class="home-slider">
                        <div class="container container2">
                            <div class="row">
                                <div class="col-md-7 px-0">
                                    <div class="slider-content animate__animated animate__fadeInLeft 100vh pr-lg-5 py-4">
                                        <h1 class="fw600 mb-0">Exotic Fruits</h1>
                                        <h1 class="fw800 mb-3 primary-color">30%* cheaper.</h1>
                                        <p class="mb-2 pr-md-4 fw500">Get your fresh exotic produce at fair prices,
                                            directly from a variety of local farms and sellers serving your community!</p>

                                        <a href="#communities">
                                            <p class="explore-card my-4 fw500"> Get started now &nbsp;
                                                <i class="fal fa-long-arrow-right fsize20 align-middle"></i>
                                            </p>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="communities"></div>

                </div>
            </div>
        </div>

        <div class="container py-5">

            <div class="mt-2">
                <div class="community-serve text-center">
                    <div class="py-md-5 py-4">
                        <h4 class="fw700 title-txt">Our most popular communities </h4>
                        <p class="w-75 mx-auto mb-0 body-txt">More than 500+ customers across South Mumbai's finest
                            gated communities have signed up to the SafeQU experience. Choose your community and get
                            started now
                        </p>

                        <div class="py-4">
                            <div class="community-slider owl-carousel owl-theme">

                                @foreach ($communities as $community)
                                    <div class="item py-3 px-2">
                                        <div class="community-card mx-auto p-3 pt-4">
                                            <div class="card-img mb-1">
                                                @if (isset($community->user->avatar_original))
                                                    <img src="{{ uploaded_asset($community->user->avatar_original) }}"
                                                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';"
                                                        class="img-rounded" alt="{{ $community->name }}">
                                                @else
                                                    <img src=""
                                                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';"
                                                        class="img-rounded" alt="{{ $community->name }}">
                                                @endif
                                            </div>
                                            <div class="card-data pt-3 pb-4">
                                                <h6 class="fw700 mb-1">{{ $community->name }}</h6>
                                                <p class="mb-0 body-txt">{{ $community->address }}</p>
                                            </div>

                                            <div
                                                class="card-members  @if (count($community->orders->unique('user_id')) > 0) pb-3 @else pb-5 @endif">
                                                <div class="mbr-img">
                                                    @foreach ($community->orders->unique('user_id') as $i => $order)
                                                        @if ($i < 5)
                                                            <img src="{{ uploaded_asset($order->user->avatar_original) }}"
                                                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-default.webp') }}';">
                                                        @endif
                                                    @endforeach
                                                </div>
                                                @if (count($community->orders->unique('user_id')) > 0)
                                                    <div class="mbr-cnt">
                                                        <p class="mb-0 body-txt">
                                                            {{ count($community->orders->unique('user_id')) > 1? count($community->orders->unique('user_id')) . ' Members': count($community->orders->unique('user_id')) . ' Member' }}
                                                        </p>
                                                    </div>
                                                @endif
                                            </div>

                                            @if (session()->has('shop_slug') && session()->get('shop_slug') != $community->slug)
                                                <a href="javascript:void(0);"
                                                    class="btn primary-btn btn-block fw600 text-white"
                                                    onclick="confrimCommunityChange('{{ route('shop.visit', $community->slug) }}');">JOIN</a>
                                            @else
                                                <a href="{{ route('shop.visit', $community->slug) }}"
                                                    class="btn primary-btn btn-block fw600 text-white">JOIN</a>
                                            @endif

                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                        @if (count($communities) > 5)
                            <button class="btn fw700 view-more-btn px-4 mb-3 mb-md-0">View more</button>
                        @endif

                    </div>
                </div>
            </div>
        </div>

        <div class="primary-color-bg community-create my-4">
            <div class="container py-3">
                <div class="row justify-content-center">
                    <div class="col-md-9 px-0">
                        <div class="px-4 py-5 text-center">
                            <h4 class="text-white mb-3 fw600">Not able to find your community? Request to get started now.
                            </h4>
                            <p class="text-white fw500 mb-2">Would you like the SafeQU experience for your community?</p>
                            <p class="text-white fw500 mb-4">Ping us here and we will get your community setup in minutes.
                            </p>
                            <a href="https://uh19vww4t9p.typeform.com/to/ZuY8xtQq" target="_blank">
                                <button type="button" class="btn">Create Community</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-5">
            <div class="container mb-3">
                <h4 class="fw700 text-center">Why our communities love SafeQU?</h4>
                <p class="text-center fw500">
                    Over 5000+ people use SafeQu every month to save their time and money
                </p>
                <div class="row justify-content-center pt-3">
                    <div class="col-md-7 light-bg">
                        <div class="testimonials owl-carousel owl-theme">
                            <div class="item p-4 px-md-5">
                                <i class="fad fa-quote-left fa-3x mb-3"></i>
                                <p class="body-txt text-center">SafeQU gives me a business class experience in my
                                    grocery shopping.</p>

                                <p class="fw700 text-center">Resident
                                    <br>
                                    <span class="fsize13">Planet Godrej</span>
                                </p>
                                <p class="text-right mb-0">
                                    <i class="fad fa-quote-right fa-3x"></i>
                                </p>
                            </div>
                            <div class="item p-4 px-md-5">
                                <i class="fad fa-quote-left fa-3x mb-3"></i>
                                <p class="body-txt text-center">Love all your produce….Avocados, Passion Fruits and
                                    Strawberries. Most of all your customer attention to detail. Thanks!</p>

                                <p class="fw700 text-center">Resident
                                    <br>
                                    <span class="fsize13">Chaitanya Towers</span>
                                </p>
                                <p class="text-right mb-0">
                                    <i class="fad fa-quote-right fa-3x"></i>
                                </p>
                            </div>
                            <div class="item p-4 px-md-5">
                                <i class="fad fa-quote-left fa-3x mb-3"></i>
                                <p class="body-txt text-center">7 days in and my light pink roses are still fresh &
                                    beautiful. Thanks, SafeQU for sorting me out with my weekly flowers</p>

                                <p class="fw700 text-center">Resident
                                    <br>
                                    <span class="fsize13">Lodha Park</span>
                                </p>
                                <p class="text-right mb-0">
                                    <i class="fad fa-quote-right fa-3x"></i>
                                </p>
                            </div>
                            <div class="item p-4 px-md-5">
                                <i class="fad fa-quote-left fa-3x mb-3"></i>
                                <p class="body-txt text-center">Thankyou @safequ.india for introducing me to the
                                    brilliant farm fresh produce and the weekly salad subscription service. The
                                    Romaine Lettuce particularly felt like it had been picked from my back garden</p>

                                <p class="fw700 text-center">Hema W, Resident
                                    <br>
                                    <span class="fsize13">Lodha Park</span>
                                </p>
                                <p class="text-right mb-0">
                                    <i class="fad fa-quote-right fa-3x"></i>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="light-bg py-5 mt-4">
            <div class="container pt-3">
                <h5 class="text-center fw700 pb-3   ">
                    South Mumbai's only premium farm-to-home exotic produce delivery
                </h5>

                <div class="row pt-3">
                    <div class="col-md-4 px-md-4 pb-3 text-center">
                        <img src="{{ static_asset('assets/img/fast-delivery.png') }}" alt="3D Icon"
                            class="icons3D">
                        <p class="fw600 fsize16 my-2">Choice of local farms & sellers</p>
                        <p class="mb-0">Your produce is delivered to your doorstep straight from the farm you
                            choose to buy from. Everything is harvested fresh as per demand.</p>
                    </div>

                    <div class="col-md-4 px-md-4 pb-3 text-center">
                        <img src="{{ static_asset('assets/img/grocery-bag.png') }}" alt="3D Icon" class="icons3D">
                        <p class="fw600 fsize16 my-2">Fresh, peak flavour produce</p>
                        <p class="mb-0">Your produce is pesticide free and full of flavour. Our warehousing team
                            works hard to deliver to your doorstep the freshest & safest produce within 12 hrs of harvest
                            &nbsp; **For most products.</p>
                    </div>

                    <div class="col-md-4 px-md-4 pb-3 text-center">
                        <img src="{{ static_asset('assets/img/fast-delivery.png') }}" alt="3D Icon"
                            class="icons3D">
                        <p class="fw600 fsize16 my-2">Fair Pricing</p>
                        <p class="mb-0">Fair, dynamic pricing model to allow communities to avail group buying
                            benefits.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Change Community Modal Starts -->
        <div class="modal fade changeCommunityModal" id="changeCommunityModal" tabindex="-1"
            aria-labelledby="changeCommunityModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Change Community</h5>
                        <div class="close-btn text-right">
                            <a href="javascript:void(0)" class="fw900" data-dismiss="modal">X</a>
                        </div>
                    </div>
                    <form action="" class="form-default" role="form" method="GET" id="change-community-form">
                        @csrf
                        <div class="modal-body">
                            <div class="item-details px-sm-3">
                                <div class="order-list text-center py-3">
                                    <h6> Are you sure you want to leave {{ session()->get('shop_name') }}
                                        community ? </h6>
                                    <p class="mb-0">
                                        <i class="fad primary-color fa-exclamation-circle fsize14" aria-hidden="true"></i>
                                        <span class="fsize12 body-txt ordered-qty"> Cart items will get removed.
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn primary-btn fw600 text-white">Yes</button>
                            <button type="button" class="btn btn-secondary btn-no fw600 text" data-dismiss="modal">No
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Change Community Modal Ends -->

    </main>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $('.carousel').carousel({
                interval: 7000,
            })

            $('.community-slider').owlCarousel({
                loop: true,
                autoplay: true,
                autoplayTimeout: 4000,
                autoplayHoverPause: false,
                smartSpeed: 1500,
                responsive: {
                    0: {
                        items: 1
                    },
                    460: {
                        items: 2
                    },
                    768: {
                        items: 3
                    },
                    991: {
                        items: 4
                    },
                    1200: {
                        items: 5
                    }
                }
            })

            $('.testimonials').owlCarousel({
                loop: true,
                nav: true,
                dots: false,
                margin: 10,
                autoplay: false,
                autoplayTimeout: 4000,
                autoplayHoverPause: false,
                smartSpeed: 1500,
                items: 1,
                navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"]
            })
        })

        function confrimCommunityChange(url) {
            $('#changeCommunityModal').modal('show');
            $('#changeCommunityModal #change-community-form').attr('action', url);
        }
    </script>
@endsection
