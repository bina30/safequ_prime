@extends('frontend.layouts.app', ['header_show' => true, 'header2' => false, 'footer' => true])

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
                                        <p class="mb-2 pr-md-4">Get your fresh exotic produce at fair prices, directly
                                            from a variety of local farms and sellers serving your community!</p>

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
                        <p class="w-75 mx-auto mb-0 body-txt">More than 500+ customers across South Mumbai's finest gated
                            communities have signed up to the SafeQU experience. Choose your community and get started now
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

                                            <div class="card-members  @if(count($community->orders->unique('user_id')) > 0) pb-3 @else pb-5 @endif">
                                                <div class="mbr-img">
                                                    @foreach ($community->orders->unique('user_id') as $i => $order)
                                                        @if($i < 5)
                                                            <img src="{{ uploaded_asset($order->user->avatar_original) }}"
                                                                 onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-default.webp') }}';">
                                                        @endif
                                                    @endforeach
                                                </div>
                                                @if(count($community->orders->unique('user_id')) > 0)
                                                    <div class="mbr-cnt">
                                                        <p class="mb-0 body-txt">{{count($community->orders->unique('user_id')) > 1 ? count($community->orders->unique('user_id')).' Members' : count($community->orders->unique('user_id')).' Member' }}</p>
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

        <div class="primary-color-bg community-create">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-9 px-0">
                        <div class="px-4 py-5 text-center">
                            <h5 class="text-white mb-3 fw500">Not able to find your community? Request to get started now.
                            </h5>
                            <p class="text-white fw500 mb-2">Would you like the SafeQU experience for your community?</p>
                            <p class="text-white fw500 mb-3">Ping us here and we will get your community setup in minutes.
                            </p>
                            <a href="https://uh19vww4t9p.typeform.com/to/ZuY8xtQq" target="_blank">
                                <button type="button" class="btn mb-2">Create Community</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-5">
            <h5 class="text-center fw700">Over 5000+ people use SafeQu every month to save their time and money</h5>

            <div class="row justify-content-center pt-4">
                <div class="col-lg-5 col-md-6 primary-color-bg">
                    <div class="p-4 w-100 h-100 d-flex align-items-center justify-content-center">
                        <h4 class="text-white mb-1 fw700 text-center">What our customers say!</h4>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 light-bg">
                    <div class="p-4 px-md-5">
                        <div class="testimonials owl-carousel owl-theme">
                            <div class="item">
                                <i class="fad fa-quote-left fa-3x body-txt mb-2"></i>
                                <p class="body-txt">Subscribe to anything. Tell us how you want your day
                                    sorted and we will do the heavy lifting for you. Subscribe to anything. Tell us
                                    how you want your day sorted and we will do the heavy lifting for you.</p>

                                <p class="fw700 text-center">- Rahul Jain <span class="body-txt fsize12">CEO</span>
                                </p>
                            </div>
                            <div class="item">
                                <i class="fad fa-quote-left fa-3x body-txt mb-2"></i>
                                <p class="body-txt">Subscribe to anything. Tell us how you want your day
                                    sorted and we will do the heavy lifting for you. Subscribe to anything. Tell us
                                    how you want your day sorted and we will do the heavy lifting for you.</p>

                                <p class="fw700 text-center">- Karan DG <span class="body-txt fsize12">CEO</span>
                                </p>
                            </div>
                            <div class="item">
                                <i class="fad fa-quote-left fa-3x body-txt mb-2"></i>
                                <p class="body-txt">Subscribe to anything. Tell us how you want your day
                                    sorted and we will do the heavy lifting for you. Subscribe to anything. Tell us
                                    how you want your day sorted and we will do the heavy lifting for you.</p>

                                    <p class="fw700 text-center">- Vinod Shukla <span
                                                class="body-txt fsize12">CEO</span>
                                    </p>
                                </div>
                            </div>
                        </div>
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
                                        <i class="fad primary-color fa-exclamation-circle fsize14"
                                           aria-hidden="true"></i>
                                               <span class="fsize12 body-txt ordered-qty"> Cart items will get removed.
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn primary-btn fw600 text-white">Yes</button>
                            <button type="button" class="btn btn-secondary btn-no fw600 text"
                                data-dismiss="modal">No
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
                loop: false,
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
                margin: 10,
                autoplay: true,
                autoplayTimeout: 4000,
                autoplayHoverPause: false,
                smartSpeed: 1500,
                items: 1
            })
        })

        function confrimCommunityChange(url) {
            $('#changeCommunityModal').modal('show');
            $('#changeCommunityModal #change-community-form').attr('action', url);
        }
    </script>
@endsection
