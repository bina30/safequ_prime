@extends('frontend.layouts.app',['header_show' => true, 'header2' => true, 'footer' => true])

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
<meta property="og:title" content="{{ $meta_title }}" />
<meta property="og:description" content="{{ $meta_description }}" />
@endsection

@section('content')

<main class="main-tag mt-0">

    <div class="breadcrumbs high">
        <div class="container">
            <h5 class="mb-0 fw700 text-white text-uppercase">Your Community - {{ $shop->name }}</h5>
        </div>
    </div>

    <!-- Cards -->
    <div class="content pb-5 bgcream">
        <div class="container">
            <div class="row justify-content-center">

                @if ($categories && (count($products_purchase_expired) > 0 || count($products_purchase_started) > 0))
                <div class="col-12 pb-md-5 pb-4 px-0 mt-5">

                    <!-- ===============first mobile card================= -->
                    <div class="mobile_hr_card">
                        <div class="shop-datail">
                            <div class="shop-datail">
                                <div class="mainimg">
                                    <img src="../public/assets/img/fruite-1.png" class="img-fluid">
                                </div>
                                <div>
                                    <div>
                                        <h3>Beauty Pear</h3>
                                        <p>&#x20B9;149.00 / 500 gms</p>
                                    </div>

                                </div>


                            </div>
                            <div class="countitem ">
                                <div class="input-group w-auto counterinput ">
                                    <input type="button" value="-" class="button-minus   icon-shape icon-sm  lftcount" data-field="quantity">
                                    <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field border-0 text-center w-25">
                                    <input type="button" value="+" class="button-plus icon-shape icon-sm lh-0 rgtcount" data-field="quantity">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ===============first mobile card================= -->

                    <!-- ===============secondmobile card================= -->
                    <div class="mobile_hr_card">
                        <div class="shop-datail">
                            <div class="shop-datail">
                                <div class="mainimg">
                                    <img src="../public/assets/img/fruite-1.png" class="img-fluid">
                                </div>
                                <div>
                                    <div>
                                        <h3>Beauty Pear</h3>
                                        <p>&#x20B9;149.00 / 500 gms</p>
                                    </div>

                                </div>


                            </div>
                            <div class="countitem ">
                                <div class="input-group w-auto counterinput ">
                                    <input type="button" value="-" class="button-minus   icon-shape icon-sm  lftcount" data-field="quantity">
                                    <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field border-0 text-center w-25">
                                    <input type="button" value="+" class="button-plus icon-shape icon-sm lh-0 rgtcount" data-field="quantity">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ===============second mobile card================= -->

                    <!-- ===============third mobile card================= -->
                    <div class="mobile_hr_card">
                        <div class="shop-datail">
                            <div class="shop-datail">
                                <div class="mainimg">
                                    <img src="../public/assets/img/fruite-1.png" class="img-fluid">
                                </div>
                                <div>
                                    <div>
                                        <h3>Beauty Pear</h3>
                                        <p>&#x20B9;149.00 / 500 gms</p>
                                    </div>

                                </div>


                            </div>
                            <div class="countitem ">
                                <div class="input-group w-auto counterinput ">
                                    <input type="button" value="-" class="button-minus   icon-shape icon-sm  lftcount" data-field="quantity">
                                    <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field border-0 text-center w-25">
                                    <input type="button" value="+" class="button-plus icon-shape icon-sm lh-0 rgtcount" data-field="quantity">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ===============third  mobile card================= -->
                    <!-- ===============fourth mobile card================= -->
                    <div class="mobile_hr_card">
                        <div class="shop-datail">
                            <div class="shop-datail">
                                <div class="mainimg">
                                    <img src="../public/assets/img/fruite-1.png" class="img-fluid">
                                </div>
                                <div>
                                    <div>
                                        <h3>Beauty Pear</h3>
                                        <p>&#x20B9;149.00 / 500 gms</p>
                                        <p class="fruite-location">Farm Location:<span>Nashik</span></p>
                                    </div>

                                </div>


                            </div>
                            <div class="countitem ">
                                <div class="input-group w-auto counterinput ">
                                    <input type="button" value="-" class="button-minus   icon-shape icon-sm  lftcount" data-field="quantity">
                                    <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field border-0 text-center w-25">
                                    <input type="button" value="+" class="button-plus icon-shape icon-sm lh-0 rgtcount" data-field="quantity">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ===============fourth  mobile card================= -->
                     <!-- ===============fourth mobile card================= -->
                     <div class="mobile_hr_card">
                        <div class="shop-datail">
                            <div class="shop-datail">
                                <div class="mainimg">
                                    <img src="../public/assets/img/fruite-1.png" class="img-fluid">
                                </div>
                                <div>
                                    <div>
                                        <h3>Beauty Pear</h3>
                                        <p>&#x20B9;149.00 / 500 gms</p>
                                        <p class="fruite-location">Farm Location:<span>Nashik</span></p>
                                    </div>

                                </div>


                            </div>
                            <div class="countitem ">
                                <div class="input-group w-auto counterinput ">
                                    <input type="button" value="-" class="button-minus   icon-shape icon-sm  lftcount" data-field="quantity">
                                    <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field border-0 text-center w-25">
                                    <input type="button" value="+" class="button-plus icon-shape icon-sm lh-0 rgtcount" data-field="quantity">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ===============fourth  mobile card================= -->
                     <!-- ===============fourth mobile card================= -->
                     <div class="mobile_hr_card">
                        <div class="shop-datail">
                            <div class="shop-datail">
                                <div class="mainimg">
                                    <img src="../public/assets/img/fruite-1.png" class="img-fluid">
                                </div>
                                <div>
                                    <div>
                                        <h3>Beauty Pear</h3>
                                        <p>&#x20B9;149.00 / 500 gms</p>
                                        <p class="fruite-location">Farm Location:<span>Nashik</span></p>
                                    </div>

                                </div>


                            </div>
                            <div class="countitem ">
                                <div class="input-group w-auto counterinput ">
                                    <input type="button" value="-" class="button-minus   icon-shape icon-sm  lftcount" data-field="quantity">
                                    <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field border-0 text-center w-25">
                                    <input type="button" value="+" class="button-plus icon-shape icon-sm lh-0 rgtcount" data-field="quantity">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ===============fourth  mobile card================= -->
                     <!-- ===============fourth mobile card================= -->
                     <div class="mobile_hr_card">
                        <div class="shop-datail">
                            <div class="shop-datail">
                                <div class="mainimg">
                                    <img src="../public/assets/img/fruite-1.png" class="img-fluid">
                                </div>
                                <div>
                                    <div>
                                        <h3>Beauty Pear</h3>
                                        <p>&#x20B9;149.00 / 500 gms</p>
                                        <p class="fruite-location">Farm Location:<span>Nashik</span></p>
                                    </div>

                                </div>


                            </div>
                            <div class="countitem ">
                                <div class="input-group w-auto counterinput ">
                                    <input type="button" value="-" class="button-minus   icon-shape icon-sm  lftcount" data-field="quantity">
                                    <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field border-0 text-center w-25">
                                    <input type="button" value="+" class="button-plus icon-shape icon-sm lh-0 rgtcount" data-field="quantity">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ===============fourth  mobile card================= -->
                     <!-- ===============fourth mobile card================= -->
                     <div class="mobile_hr_card">
                        <div class="shop-datail">
                            <div class="shop-datail">
                                <div class="mainimg">
                                    <img src="../public/assets/img/fruite-1.png" class="img-fluid">
                                </div>
                                <div>
                                    <div>
                                        <h3>Beauty Pear</h3>
                                        <p>&#x20B9;149.00 / 500 gms</p>
                                        <p class="fruite-location">Farm Location:<span>Nashik</span></p>
                                    </div>

                                </div>


                            </div>
                            <div class="countitem ">
                                <div class="input-group w-auto counterinput ">
                                    <input type="button" value="-" class="button-minus   icon-shape icon-sm  lftcount" data-field="quantity">
                                    <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field border-0 text-center w-25">
                                    <input type="button" value="+" class="button-plus icon-shape icon-sm lh-0 rgtcount" data-field="quantity">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ===============fourth  mobile card================= -->
                     <!-- ===============fourth mobile card================= -->
                     <div class="mobile_hr_card">
                        <div class="shop-datail">
                            <div class="shop-datail">
                                <div class="mainimg">
                                    <img src="../public/assets/img/fruite-1.png" class="img-fluid">
                                </div>
                                <div>
                                    <div>
                                        <h3>Beauty Pear</h3>
                                        <p>&#x20B9;149.00 / 500 gms</p>
                                        <p class="fruite-location">Farm Location:<span>Nashik</span></p>
                                    </div>

                                </div>


                            </div>
                            <div class="countitem ">
                                <div class="input-group w-auto counterinput ">
                                    <input type="button" value="-" class="button-minus   icon-shape icon-sm  lftcount" data-field="quantity">
                                    <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field border-0 text-center w-25">
                                    <input type="button" value="+" class="button-plus icon-shape icon-sm lh-0 rgtcount" data-field="quantity">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ===============fourth  mobile card================= -->
                     <!-- ===============fourth mobile card================= -->
                     <div class="mobile_hr_card">
                        <div class="shop-datail">
                            <div class="shop-datail">
                                <div class="mainimg">
                                    <img src="../public/assets/img/fruite-1.png" class="img-fluid">
                                </div>
                                <div>
                                    <div>
                                        <h3>Beauty Pear</h3>
                                        <p>&#x20B9;149.00 / 500 gms</p>
                                        <p class="fruite-location">Farm Location:<span>Nashik</span></p>
                                    </div>

                                </div>


                            </div>
                            <div class="countitem ">
                                <div class="input-group w-auto counterinput ">
                                    <input type="button" value="-" class="button-minus   icon-shape icon-sm  lftcount" data-field="quantity">
                                    <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field border-0 text-center w-25">
                                    <input type="button" value="+" class="button-plus icon-shape icon-sm lh-0 rgtcount" data-field="quantity">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ===============fourth  mobile card================= -->
                </div>




                @endif
            </div>
</div>
            <!-- ===============button sticky============== -->
            <div class="container">
                <div class="row ">
                    <div class="col-12 px-0">
                        <div>
                            <a href="" class="sticky-button-bottom">checkout</a>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Item Modal -->
            <div class="modal fade itemModal" id="itemModal" data-backdrop="static" tabindex="-1" aria-labelledby="itemModalLabel" aria-hidden="true">
            </div>


            <!-- Item Modal -->
            <a href="https://wa.me/917498107182" target="_blank">
                <div class="wp-help-btn flex-acenter-jbtw">
                    <span class="fw500"> Help </span> <i class="fab fa-whatsapp"></i>
                </div>
            </a>


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
            success: function(response) {
                $('#itemModal').html('');
                $('#itemModal').html(response);
                $('#itemModal').modal('show');
            }
        });
    }

    // Tooltip
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })

    $(document).ready(function() {

        // Remaining time
        $(".remaining-time").each(function() {

            const currDiv = $(this);

            // Set the date we're counting down to
            var countDownDate = new Date(currDiv.data("time")).getTime();

            // Update the count down every 1 second
            var x = setInterval(function() {

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
                currDiv.find(".seconds").text(seconds > 0 ? seconds : "00");


                if (days > 0) {
                    currDiv.find(".days").parent().addClass("active");
                } else if (days <= 0 && hours > 0) {
                    currDiv.find(".days").parent().addClass("disabled");
                    currDiv.find(".hours").parent().addClass("active");
                } else if (days <= 0 && hours <= 0 && minutes > 0) {
                    currDiv.find(".days").parent().addClass("disabled");
                    currDiv.find(".hours").parent().addClass("disabled");
                    currDiv.find(".minutes").parent().addClass("active");
                } else if (days <= 0 && hours <= 0 && minutes > 0) {
                    currDiv.find(".days").parent().addClass("disabled");
                    currDiv.find(".hours").parent().addClass("disabled");
                    currDiv.find(".minutes").parent().addClass("disabled");
                    currDiv.find(".seconds").parent().addClass("active");
                } else {
                    currDiv.find(".cnt").addClass("disabled");
                }

                $(".preloader_div").hide();
                $(".remaining-time").show();
            }, 1000);
        });


        $(".progress-bar").each(function() {
            let width = 0;
            let progressCnt = 0;
            let target = $(this).data("target");
            let unit = $(this).data("unit");
            let progress = $(this).data("progress");

            let progressComplete = parseInt((progress * 100) / target);

            const count = setInterval(() => {
                if (width != progressComplete) {
                    width++;
                    progressCnt++;
                    $(this).css("opacity", "1");
                    (width <= 100) ? $(this).css("width", width + "%"): '';
                    $(this).text(progress + ' ' + unit);
                    /*if (progressCnt <= progress) {
                        $(this).text(progress + ' ' + unit);
                    }*/
                } else {
                    clearInterval(count);
                }
            }, 15);
        });

        $(".filter-button").click(function() {
            $('.filter-button').removeClass('active_filter');
            $(this).addClass('active_filter');
            var value = $(this).attr('data-filter');

            if (value == "all") {
                //$('.filter').removeClass('hidden');
                $('.filter').show();
            } else {
                //            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
                //            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
                $(".filter").not('.' + value).hide();
                $('.filter').filter('.' + value).show();
            }
        });

    })
</script>
<script>
    function incrementValue(e) {
        e.preventDefault();
        var fieldName = $(e.target).data('field');
        var parent = $(e.target).closest('div');
        var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

        if (!isNaN(currentVal)) {
            parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
        } else {
            parent.find('input[name=' + fieldName + ']').val(0);
        }
    }

    function decrementValue(e) {
        e.preventDefault();
        var fieldName = $(e.target).data('field');
        var parent = $(e.target).closest('div');
        var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

        if (!isNaN(currentVal) && currentVal > 0) {
            parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
        } else {
            parent.find('input[name=' + fieldName + ']').val(0);
        }
    }

    $('.input-group').on('click', '.button-plus', function(e) {
        incrementValue(e);
    });

    $('.input-group').on('click', '.button-minus', function(e) {
        decrementValue(e);
    });
</script>

@endsection