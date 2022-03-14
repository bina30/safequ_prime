<!DOCTYPE html>
@if (\App\Models\Language::where('code', Session::get('locale', Config::get('app.locale')))->first()->rtl == 1)
    <html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@else
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endif

<head>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="app-url" content="{{ getBaseURL() }}">
    <meta name="file-base-url" content="{{ getFileBaseURL() }}">

    <title>@yield('meta_title', get_setting('website_name').' | '.get_setting('site_motto'))</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="description" content="@yield('meta_description', get_setting('meta_description') )" />
    <meta name="keywords" content="@yield('meta_keywords', get_setting('meta_keywords') )">

    @yield('meta')

    @if (!isset($detailedProduct) && !isset($customer_product) && !isset($shop) && !isset($page) && !isset($blog))
        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="{{ get_setting('meta_title') }}">
        <meta itemprop="description" content="{{ get_setting('meta_description') }}">
        <meta itemprop="image" content="{{ uploaded_asset(get_setting('meta_image')) }}">

        <!-- Twitter Card data -->
        <meta name="twitter:card" content="product">
        <meta name="twitter:site" content="@publisher_handle">
        <meta name="twitter:title" content="{{ get_setting('meta_title') }}">
        <meta name="twitter:description" content="{{ get_setting('meta_description') }}">
        <meta name="twitter:creator" content="@author_handle">
        <meta name="twitter:image" content="{{ uploaded_asset(get_setting('meta_image')) }}">

        <!-- Open Graph data -->
        <meta property="og:title" content="{{ get_setting('meta_title') }}" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{ route('home') }}" />
        <meta property="og:image" content="{{ uploaded_asset(get_setting('meta_image')) }}" />
        <meta property="og:description" content="{{ get_setting('meta_description') }}" />
        <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
        <meta property="fb:app_id" content="{{ env('FACEBOOK_PIXEL_ID') }}">
    @endif

    <!-- Favicon -->
    <link rel="icon" href="{{ uploaded_asset(get_setting('site_icon')) }}">

    <!-- Google Fonts -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ static_asset('assets/css/vendors.css') }}">
    @if (\App\Models\Language::where('code', Session::get('locale', Config::get('app.locale')))->first()->rtl == 1)
        <link rel="stylesheet" href="{{ static_asset('assets/css/bootstrap-rtl.min.css') }}">
    @endif

    {{-- <link rel="stylesheet" href="{{ static_asset('assets/css/aiz-core.css') }}"> --}}
    <link rel="stylesheet" href="{{ static_asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ static_asset('assets/css/custom-style.css') }}">


    <script>
        var AIZ = AIZ || {};
        AIZ.local = {
            nothing_selected: '{!! translate('Nothing selected', null, true) !!}',
            nothing_found: '{!! translate('Nothing found', null, true) !!}',
            choose_file: '{{ translate('Choose file') }}',
            file_selected: '{{ translate('File selected') }}',
            files_selected: '{{ translate('Files selected') }}',
            add_more_files: '{{ translate('Add more files') }}',
            adding_more_files: '{{ translate('Adding more files') }}',
            drop_files_here_paste_or: '{{ translate('Drop files here, paste or') }}',
            browse: '{{ translate('Browse') }}',
            upload_complete: '{{ translate('Upload complete') }}',
            upload_paused: '{{ translate('Upload paused') }}',
            resume_upload: '{{ translate('Resume upload') }}',
            pause_upload: '{{ translate('Pause upload') }}',
            retry_upload: '{{ translate('Retry upload') }}',
            cancel_upload: '{{ translate('Cancel upload') }}',
            uploading: '{{ translate('Uploading') }}',
            processing: '{{ translate('Processing') }}',
            complete: '{{ translate('Complete') }}',
            file: '{{ translate('File') }}',
            files: '{{ translate('Files') }}',
        }
    </script>


    @if (get_setting('google_analytics') == 1)
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('TRACKING_ID') }}"></script>

        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', '{{ env('TRACKING_ID') }}');
        </script>
    @endif

    @if (get_setting('facebook_pixel') == 1)
        <!-- Facebook Pixel Code -->
        <script>
            ! function(f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function() {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '{{ env('FACEBOOK_PIXEL_ID') }}');
            fbq('track', 'PageView');
        </script>
        <noscript>
            <img height="1" width="1" style="display:none"
                src="https://www.facebook.com/tr?id={{ env('FACEBOOK_PIXEL_ID') }}&ev=PageView&noscript=1" />
        </noscript>
        <!-- End Facebook Pixel Code -->
    @endif

    @php
        echo get_setting('header_script');
    @endphp

</head>

<body>

    @include('frontend.inc.nav')

    @yield('content')

    @include('frontend.inc.footer')

    @if (get_setting('show_cookies_agreement') == 'on')
        <div class="aiz-cookie-alert shadow-xl">
            <div class="p-3 bg-dark rounded">
                <div class="text-white mb-3">
                    @php
                        echo get_setting('cookies_agreement_text');
                    @endphp
                </div>
                <button class="btn btn-primary aiz-cookie-accept">
                    {{ translate('Ok. I Understood') }}
                </button>
            </div>
        </div>
    @endif

    @if (get_setting('show_website_popup') == 'on')
        <div class="modal website-popup removable-session d-none" data-key="website-popup" data-value="removed">
            <div class="absolute-full bg-black opacity-60"></div>
            <div class="modal-dialog modal-dialog-centered modal-dialog-zoom modal-md">
                <div class="modal-content position-relative border-0 rounded-0">
                    <div class="aiz-editor-data">
                        {!! get_setting('website_popup_content') !!}
                    </div>
                    @if (get_setting('show_subscribe_form') == 'on')
                        <div class="pb-5 pt-4 px-5">
                            <form class="" method="POST" action="{{ route('subscribers.store') }}">
                                @csrf
                                <div class="form-group mb-0">
                                    <input type="email" class="form-control"
                                        placeholder="{{ translate('Your Email Address') }}" name="email" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block mt-3">
                                    {{ translate('Subscribe Now') }}
                                </button>
                            </form>
                        </div>
                    @endif
                    <button
                        class="absolute-top-right bg-white shadow-lg btn btn-circle btn-icon mr-n3 mt-n3 set-session"
                        data-key="website-popup" data-value="removed" data-toggle="remove-parent"
                        data-parent=".website-popup">
                        <i class="la la-close fs-20"></i>
                    </button>
                </div>
            </div>
        </div>
    @endif


    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script>
        // Tooltip
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })

        let header = document.getElementsByClassName("main-tag");
        let sticky = header.length > 0 ? header[0].offsetTop : '';

        window.onscroll = function() {
            myFunction()
        };

        function myFunction() {
            if (window.pageYOffset > sticky) {
                $(".breadcrumbs").addClass("sticky");
            } else {
                $(".breadcrumbs").removeClass("sticky");
            }
        }

        $(document).ready(function() {
            // Unit Qty select
            $(".amt-btn").on('click', function() {
                let amount = $(this).data('amt');
                $('#wallet_amount').val(amount);
                $('#btnAmt').text(amount);
                $('#btnAmt').parent().removeClass("disabled");
            })

            $('#wallet_amount').on('keyup touchend', function() {
                let value = $(this).val();

                if (value != '' && value != 0) {
                    $('#btnAmt').text(value), $('#btnAmt').parent().removeClass("disabled");
                } else {
                    $('#btnAmt').text(0), $('#btnAmt').parent().addClass("disabled");
                }
            })

            $(".close-sidenav").on('click', function() {
                $(".sideNav").removeClass("active");
            })

            $(".navbar-toggler").on('click', function() {
                $(".sideNav").addClass("active");
            })

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

            $('.item-count button').on('click', function() {
                let qty = $("#quantity").val();
                $("#itm-cnt").text(qty);

                if (qty >= 10) {
                    $("#itm-cnt").removeClass("d2 d3");
                    $("#itm-cnt").addClass("d2");
                }

                if (qty >= 100) {
                    $("#itm-cnt").removeClass("d2 d3");
                    $("#itm-cnt").addClass("d3");
                }

                (qty < 10) ? $("#itm-cnt").removeClass("d2 d3"): "";

            })

            $(".progress-bar").each(function() {
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
                        (width <= 100) ? $(this).css("width", width + "%"): '';
                        if (progressCnt <= progress) {
                            $(this).text(progressCnt + ' ' + unit);
                        }
                    } else {
                        clearInterval(count);
                    }
                }, 15);
            });
        });

        $(window).on('scroll', function() {
            $(window).scrollTop() > 5 ? ($("header").addClass("scrolled"), $(".home-header .navbar-nav")
                .removeClass("mr-auto"), $(".home-header .navbar-nav").addClass("ml-auto")) : ($("header")
                .removeClass("scrolled"), $(".home-header .navbar-nav").addClass("mr-auto"), $(
                    ".home-header .navbar-nav").removeClass("ml-auto"));
        })
    </script>

    @if(@$owlCarousel)
        <script>
            $(document).ready(function() {

                $('.carousel').carousel({
                    interval: 7000,
                })

                $('.community-slider').owlCarousel({
                    loop: true,
                    // nav: true,
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
                    // nav: true,
                    margin: 10,
                    autoplay: true,
                    autoplayTimeout: 4000,
                    autoplayHoverPause: false,
                    smartSpeed: 1500,
                    items: 1
                })
            })
        </script>
    @endif
    @include('frontend.partials.modal')

    @yield('modal')

    @yield('script')

    @php
        echo get_setting('footer_script');
    @endphp


    <!-- SCRIPTS -->
    <script src="{{ static_asset('assets/js/frontend_vendors.js') }}"></script>
    <script src="{{ static_asset('assets/js/aiz-core.js') }}"></script>

    <script>
        @foreach (session('flash_notification', collect())->toArray() as $message)
            AIZ.plugins.notify('{{ $message['level'] }}', '{{ $message['message'] }}');
        @endforeach
    </script>
</body>

</html>
