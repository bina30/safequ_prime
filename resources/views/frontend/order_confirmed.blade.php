@extends('frontend.layouts.app', ['header_show' => true, 'header2' => true, 'footer' => true])

@section('content')
    <main class="main-tag mt-0">

        <div class="breadcrumbs">
            <div class="container">
                <h5 class="mb-0 fw700 text-white text-uppercase">Lodha Park Community</h5>
            </div>
        </div>

        <div class="content pb-5">
            <div class="container pt-4 mt-3">
                <div class="status-img">
                    <img src="{{ static_asset('assets/img/right-tick.png') }}" alt="Status Img">
                </div>
                <div class="row justify-content-center pt-3">
                    <div class="col-md-8 col-lg-6">
                        <div class="text-center py-3">
                            <h5 class="body-txt">Thank You!</h5>
                            <h5 class="title-txt">Your order has been placed</h5>
                        </div>

                        <div class="thankyou-card">
                            <div class="d-flex justify-content-between align-items-center pb-3">
                                <div class="img-name d-flex align-items-center">
                                    <div class="item-img text-center">
                                        <img src="{{ static_asset('assets/img/strawberry.png') }}" alt="Item image" />
                                    </div>
                                    <div class="pl-3">
                                        <h6 class="fw700">Strawberry White Goblin</h6>
                                        <p class="fw600 body-txt mb-0">Variety: Ac Valley Sunset</p>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center pt-2">
                                <a href="order-details.html">
                                    <button class="btn primary-btn text-uppercase btn-round">
                                        Order Details
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="px-3 pt-4 mt-3 pb-2 pb-0 text-center w-md-50 mx-auto">
                    <a href="products.html">Continue Shopping &nbsp;&nbsp; <i class="fal fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </main>
@endsection
