@extends('frontend.layouts.app', ['header_show' => true, 'header2' => true, 'footer' => true])

@if (isset($category_id))
    @php
        $meta_title = \App\Models\Category::find($category_id)->meta_title;
        $meta_description = \App\Models\Category::find($category_id)->meta_description;
    @endphp
@elseif (isset($brand_id))
    @php
        $meta_title = \App\Models\Brand::find($brand_id)->meta_title;
        $meta_description = \App\Models\Brand::find($brand_id)->meta_description;
    @endphp
@else
    @php
        $meta_title = get_setting('meta_title');
        $meta_description = get_setting('meta_description');
    @endphp
@endif

@section('meta_title'){{ $meta_title }}@stop
@section('meta_description'){{ $meta_description }}@stop

@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $meta_title }}">
    <meta itemprop="description" content="{{ $meta_description }}">

    <!-- Twitter Card data -->
    <meta name="twitter:title" content="{{ $meta_title }}">
    <meta name="twitter:description" content="{{ $meta_description }}">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $meta_title }}"/>
    <meta property="og:description" content="{{ $meta_description }}"/>
@endsection

@section('content')

    <main class="main-tag mt-0">

        <div class="breadcrumbs high">
            <div class="container">
                <h5 class="mb-0 fw700 text-white text-uppercase">{{ $shop->name }} Community</h5>
            </div>
        </div>

        <!-- Cards -->
        <div class="content pb-5">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-12 pb-md-5 pb-4 px-2">
                        <div class="srch-fltr-card p-4 mb-md-0 mb-2">
                            <h5 class="fw700 mb-0" id="filter_name">Items</h5>
                        </div>
                    </div>

                    @if(count($products_purchase_expired) > 0)
                        @foreach($products_purchase_expired AS $expired_product)
                            <div class="col-lg-4 col-md-6 col-sm-8 px-2 pb-4 timeout-card">
                                <!-- Item Cards -->
                                <div class="item-card p-3">

                                    <div class="d-flex justify-content-start align-items-center">
                                        <div class="img-name pr-2">
                                            <div class="item-img item-img-sm text-center">
                                                <img src="{{ uploaded_asset($expired_product->photos) }}"
                                                     onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';"
                                                     alt="{{ $expired_product->name }}"/>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="fw500 fsize14 title-txt mb-1">{{ $expired_product->name }}</p>
                                            <p class="mb-0 fsize12 body-txt ordered-qty">
                                                <i class="fas fa-map-marker-alt"></i>
                                                {{ $expired_product->manufacturer_location }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="item-data text-center py-3">
                                        <div class="progress-div">
                                            <div class="progress">
                                                <p class="mb-0 fsize13 text-white">
                                                    Ran out of time
                                                    <span class="fsize13 text-white">(55Kg ordered)</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#orderListModal">
                                        <div class="card-members">
                                            <div class="mbr-img pr-3">
                                                <img src="{{ static_asset('assets/img/user-2.webp') }}"
                                                     alt="Community Img">
                                                <img src="{{ static_asset('assets/img/user-3.webp') }}"
                                                     alt="Community Img">
                                                <img src="{{ static_asset('assets/img/user-4.webp') }}"
                                                     alt="Community Img">
                                            </div>
                                            <div class="mbr-cnt pl-2">
                                                <p class="mb-0 text-primary fsize13">ordered</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    @if(count($products_purchase_started) > 0)
                        @foreach($products_purchase_started AS $product)
                            <div class="col-lg-4 col-md-6 col-sm-8 px-2 pb-4">
                                <!-- Item Cards -->
                                <div class="item-card">
                                    <div class="card-top">
                                        <div class="pricing text-center">
                                            <span class="text-white">Price Per {{ $product->unit }}</span>
                                            <h6 class="mb-0 mt-2 mx-auto">
                                                {!! single_price($product->unit_price)  !!}
                                            </h6>
                                        </div>
                                        <div class="item-img text-center">
                                            <img src="{{ uploaded_asset($product->photos) }}"
                                                 onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';"
                                                 alt="{{ $product->name }}"/>
                                        </div>
                                        <div class="nxt-delivery">
                                            <span class="text-white">Next Shipment</span>
                                            <h6 class="mb-0 mt-2 text-center mx-auto">{{ date("d", strtotime($product->purchase_end_date)) }}
                                                <br>
                                                <ins>{{ date("F", strtotime($product->purchase_end_date)) }}</ins>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="item-data text-center pt-5 px-3">
                                        <div class="px-2">
                                            <h6 class="pt-1 fw700 mb-1">{{ $product->name }}</h6>
                                            <p class="fw600f fsize13 body-txt mb-2">Variety: {{ $product->tags }}</p>
                                            <a href="reviews.html">
                                                <p class="rating-stars">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fad fa-star-half-alt"></i>
                                                </p>
                                            </a>
                                            <p class="body-txt fsize13 font-italic pb-1">
                                                <i class="fas fa-map-marker-alt"></i>
                                                {{ $product->manufacturer_location }}
                                            </p>
                                            <hr>
                                        </div>
                                        <p class="fw700 px-2">Time Remaining</p>
                                        <div class="remaining-time pb-2 px-2"
                                             data-time="{{ date('m-d-Y H:i:s', strtotime($product->purchase_end_date)) }}">
                                            <div class="timing">
                                                <div class="cnt">
                                                    <h2 class="mb-0 days ">00</h2>
                                                </div>
                                                <span>Days</span>
                                            </div>
                                            <div class="timing">
                                                <div class="cnt">
                                                    <h2 class="mb-0 hours">00</h2>
                                                </div>
                                                <span>Hours</span>
                                            </div>
                                            <div class="timing">
                                                <div class="cnt">
                                                    <h2 class="mb-0 minutes">00</h2>
                                                </div>
                                                <span>Minutes</span>
                                            </div>
                                        </div>

                                        <div class="order-progress text-center pt-3 px-2">
                                            <p class="fw600 target-qty">Order
                                                Target: {{ $product->min_qty }} {{ $product->unit }}&nbsp;
                                                <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top"
                                                   title="Lorem ipsum, dolor sit amet consectetur adipisicing elit. Porro beatae dolorem ea veritatis.">
                                                    <i class="fad fa-info-circle animated faa-tada align-middle"></i>
                                                </a>
                                            </p>
                                        </div>
                                        <div class="progress-div mb-4">
                                            <div class="progress">
                                                <div class="progress-bar" data-target="20" data-progress="8"
                                                     data-unit="Kg">0
                                                </div>
                                            </div>
                                        </div>

                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#orderListModal">
                                            <div class="card-members pb-3">
                                                <div class="mbr-img pr-3">
                                                    <img src="{{ static_asset('assets/img/user-2.webp') }}"
                                                         alt="Community Img">
                                                    <img src="{{ static_asset('assets/img/user-3.webp') }}"
                                                         alt="Community Img">
                                                    <img src="{{ static_asset('assets/img/user-4.webp') }}"
                                                         alt="Community Img">
                                                </div>
                                                <div class="mbr-cnt pl-2">
                                                    <p class="mb-0 text-primary fsize13">have already ordered</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card-bottom">
                                        <button class="btn text-uppercase text-white fw600 w-100"
                                                onclick="addToCart('{{route('products-details', $product->id)}}');">
                                            <i class="fas fa-shopping-cart text-white fsize18"></i>
                                            &nbsp; Add to cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>

            </div>
        </div>


        <!-- Item Modal -->
        <div class="modal fade itemModal" id="itemModal" data-backdrop="static" tabindex="-1"
             aria-labelledby="itemModalLabel" aria-hidden="true">
        </div>

        <!-- Community Order list Modal -->
        <div class="modal fade orderListModal" id="orderListModal" tabindex="-1" aria-labelledby="orderListModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="close-btn text-right">
                            <a href="javascript:void(0)" class="fw900" data-dismiss="modal">X</a>
                        </div>
                        <div class="item-details px-sm-3">

                            <div class="order-list pt-4">
                                <div class="item-card p-3 mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="pr-2">
                                            <p class="fw600 fsize15 title-txt mb-1">Rahul Jain</p>
                                            <p class="mb-0 lh-17">
                                                <span class="fsize13 body-txt ordered-qty"> 25Kg </span>
                                                <span class="fsize13 body-txt ordered-qty">
                                                    &nbsp;&bull;&nbsp; 10 Dec, 2021 3:30
                                                </span>
                                            </p>
                                        </div>
                                        <div class="user-img-sm m-0">
                                            <img src="{{ static_asset('assets/img/user-1.webp') }}" alt="User Img">
                                        </div>
                                    </div>
                                </div>

                                <div class="item-card p-3 mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="pr-2">
                                            <p class="fw600 fsize15 title-txt mb-1">Angela Carol</p>
                                            <p class="mb-0 lh-17">
                                                <span class="fsize13 body-txt ordered-qty"> 25Kg </span>
                                                <span class="fsize13 body-txt ordered-qty">
                                                    &nbsp;&bull;&nbsp; 10 Dec, 2021 3:30
                                                </span>
                                            </p>
                                        </div>
                                        <div class="user-img-sm m-0">
                                            <img src="{{ static_asset('assets/img/user-2.webp') }}" alt="User Img">
                                        </div>
                                    </div>
                                </div>

                                <div class="item-card p-3 mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="pr-2">
                                            <p class="fw600 fsize15 title-txt mb-1">Rahul Jain</p>
                                            <p class="mb-0 lh-17">
                                                <span class="fsize13 body-txt ordered-qty"> 25Kg </span>
                                                <span class="fsize13 body-txt ordered-qty">
                                                    &nbsp;&bull;&nbsp; 10 Dec, 2021 3:30
                                                </span>
                                            </p>
                                        </div>
                                        <div class="user-img-sm m-0">
                                            <img src="{{ static_asset('assets/img/user-3.webp') }}" alt="User Img">
                                        </div>
                                    </div>
                                </div>

                                <div class="item-card p-3 mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="pr-2">
                                            <p class="fw600 fsize15 title-txt mb-1">Angela Carol</p>
                                            <p class="mb-0 lh-17">
                                                <span class="fsize13 body-txt ordered-qty"> 25Kg </span>
                                                <span class="fsize13 body-txt ordered-qty">
                                                    &nbsp;&bull;&nbsp; 10 Dec, 2021 3:30
                                                </span>
                                            </p>
                                        </div>
                                        <div class="user-img-sm m-0">
                                            <img src="{{ static_asset('assets/img/user-4.webp') }}" alt="User Img">
                                        </div>
                                    </div>
                                </div>

                                <div class="item-card p-3 mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="pr-2">
                                            <p class="fw600 fsize15 title-txt mb-1">Rahul Jain</p>
                                            <p class="mb-0 lh-17">
                                                <span class="fsize13 body-txt ordered-qty"> 25Kg </span>
                                                <span class="fsize13 body-txt ordered-qty">
                                                    &nbsp;&bull;&nbsp; 10 Dec, 2021 3:30
                                                </span>
                                            </p>
                                        </div>
                                        <div class="user-img-sm m-0">
                                            <img src="{{ static_asset('assets/img/user-1.webp') }}" alt="User Img">
                                        </div>
                                    </div>
                                </div>

                                <div class="item-card p-3 mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="pr-2">
                                            <p class="fw600 fsize15 title-txt mb-1">Angela Carol</p>
                                            <p class="mb-0 lh-17">
                                                <span class="fsize13 body-txt ordered-qty"> 25Kg </span>
                                                <span class="fsize13 body-txt ordered-qty">
                                                    &nbsp;&bull;&nbsp; 10 Dec, 2021 3:30
                                                </span>
                                            </p>
                                        </div>
                                        <div class="user-img-sm m-0">
                                            <img src="{{ static_asset('assets/img/user-2.webp') }}" alt="User Img">
                                        </div>
                                    </div>
                                </div>

                                <div class="item-card p-3 mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="pr-2">
                                            <p class="fw600 fsize15 title-txt mb-1">Rahul Jain</p>
                                            <p class="mb-0 lh-17">
                                                <span class="fsize13 body-txt ordered-qty"> 25Kg </span>
                                                <span class="fsize13 body-txt ordered-qty">
                                                    &nbsp;&bull;&nbsp; 10 Dec, 2021 3:30
                                                </span>
                                            </p>
                                        </div>
                                        <div class="user-img-sm m-0">
                                            <img src="{{ static_asset('assets/img/user-3.webp') }}" alt="User Img">
                                        </div>
                                    </div>
                                </div>

                                <div class="item-card p-3 mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="pr-2">
                                            <p class="fw600 fsize15 title-txt mb-1">Angela Carol</p>
                                            <p class="mb-0 lh-17">
                                                <span class="fsize13 body-txt ordered-qty"> 25Kg </span>
                                                <span class="fsize13 body-txt ordered-qty">
                                                    &nbsp;&bull;&nbsp; 10 Dec, 2021 3:30
                                                </span>
                                            </p>
                                        </div>
                                        <div class="user-img-sm m-0">
                                            <img src="{{ static_asset('assets/img/user-4.webp') }}" alt="User Img">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

@endsection

@section('script')

    <script>
        function addToCart(url) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                type: 'POST',
                data: {},
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    $('#itemModal').html('');
                    $('#itemModal').html(response);
                    $('#itemModal').modal('show');
                }
            });
        }

        // Tooltip
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

        $(document).ready(function () {

            // Remaining time
            $(".remaining-time").each(function () {

                const currDiv = $(this);

                // Set the date we're counting down to
                var countDownDate = new Date(currDiv.data("time")).getTime();

                // Update the count down every 1 second
                var x = setInterval(function () {

                    // Get today's date and time
                    var now = new Date().getTime();

                    // Find the distance between now and the count down date
                    var distance = countDownDate - now;

                    // Time calculations for days, hours, minutes and seconds
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 *
                        60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    currDiv.find(".cnt").removeClass("active disabled");
                    currDiv.find(".days").text(days > 0 ? days : "00");
                    currDiv.find(".hours").text(hours > 0 ? hours : "00");
                    currDiv.find(".minutes").text(minutes > 0 ? minutes : "00");


                    if (days > 0) {
                        currDiv.find(".days").parent().addClass("active");
                    } else if (days <= 0 && hours > 0) {
                        currDiv.find(".days").parent().addClass("disabled");
                        currDiv.find(".hours").parent().addClass("active");
                    } else if (days <= 0 && hours <= 0 && minutes > 0) {
                        currDiv.find(".days").parent().addClass("disabled");
                        currDiv.find(".hours").parent().addClass("disabled");
                        currDiv.find(".minutes").parent().addClass("active");
                    } else {
                        currDiv.find(".cnt").addClass("disabled");
                    }
                }, 1000);
            });


            $(".progress-bar").each(function () {
                let width = 0;
                let progressCnt = 0;
                let target = $(this).data("target");
                let unit = $(this).data("unit");
                let progress = $(this).data("progress");

                let progressComplete = (progress * 100) / target;

                const count = setInterval(() => {
                    if (width != progressComplete) {
                        width++;
                        progressCnt++;
                        $(this).css("opacity", "1");
                        (width <= 100) ? $(this).css("width", width + "%") : '';
                        if (progressCnt <= progress) {
                            $(this).text(progressCnt + ' ' + unit);
                        }
                    } else {
                        clearInterval(count);
                    }
                }, 15);
            });

        })
    </script>

@endsection
