@extends('frontend.layouts.app', ['header_show' => true, 'header2' => false])

@section('content')
    <main class="main-tag main-tag-mt">

        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">

                    <div class="home-slider slider-1">
                        <div class="container container2">
                            <div class="row">
                                <div class="col-lg-6 px-0">
                                    <div class="slider-content animate__animated animate__fadeInLeft 100vh pr-lg-5 p-4">
                                        <h4 class="fw800 mb-3">All your everyday purchases in one place</h4>
                                        <p class="mb-2 pr-4">Subscribe to anything. Tell us how you want your
                                            day sorted and we will do the heavy lifting for you.</p>

                                        <div class="explore-card my-4">
                                            <p class="mb-0 fw700">Explore SafeQu</p>
                                            <i class="fal fa-long-arrow-right fa-2x"></i>
                                        </div>

                                        <div class="sl-social-icons pt-4">
                                            <a href="#"><i class="fab fa-facebook-f mx-1"></i></a>
                                            <a href="#"><i class="fab fa-instagram mx-1"></i></a>
                                            <a href="#"><i class="fab fa-whatsapp mx-1"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="carousel-item">

                    <div class="home-slider slider-2">
                        <div class="container container2">
                            <div class="row">
                                <div class="col-lg-6 px-0">
                                    <div class="slider-content animate__animated animate__fadeInLeft 100vh pr-lg-5 p-4">
                                        <h4 class="fw800 mb-3">Products straight from the source</h4>
                                        <p class="mb-2 pr-4">SWe only work with premium independent or farm-to-table
                                            brands committed to making food, drink & daily essentials to the highest
                                            standard of quality and taste</p>

                                        <div class="explore-card my-4">
                                            <p class="mb-0 fw600">Explore SafeQu</p>
                                            <i class="fal fa-long-arrow-right fa-2x"></i>
                                        </div>

                                        <div class="sl-social-icons pt-4">
                                            <a href="#"><i class="fab fa-facebook-f mx-1"></i></a>
                                            <a href="#"><i class="fab fa-instagram mx-1"></i></a>
                                            <a href="#"><i class="fab fa-whatsapp mx-1"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-8 px-0">
                    <div class="community-creat primary-color-bg p-4 py-md-5 text-center">
                        <h5 class="text-white fw700 mb-3">Build your own community</h5>

                        <button class="btn mb-2">Create Community</button>
                    </div>
                </div>
            </div>

            <div class="pt-5 mt-2">
                <div class="community-serve text-center">
                    <div class="py-md-5 py-4">
                        <h4 class="fw700 title-txt">Communities we serve</h4>
                        <p class="w-75 mx-auto mb-0 body-txt">Subscribe to anything. Tell us
                            how you want your day started and we will do the heavy lifting for you.</p>

                        <div class="py-4">
                            <div class="community-slider owl-carousel owl-theme">

                                <div class="item py-3 px-2">
                                    <div class="community-card mx-auto p-3 pt-4">
                                        <div class="card-img mb-1">
                                            <img src="{{ static_asset('assets/img/user-1.webp') }}" class="img-rounded" alt="Community Img">
                                        </div>
                                        <div class="card-data pt-3 pb-4">
                                            <h6 class="fw700 mb-1">Lodha Park</h6>
                                            <p class="mb-0 body-txt">Mumbai</p>
                                        </div>
                                        <div class="card-members pb-3">
                                            <div class="mbr-img">
                                                <img src="{{ static_asset('assets/img/user-2.webp') }}" alt="Community Img">
                                                <img src="{{ static_asset('assets/img/user-3.webp') }}" alt="Community Img">
                                                <img src="{{ static_asset('assets/img/user-4.webp') }}" alt="Community Img">
                                            </div>
                                            <div class="mbr-cnt">
                                                <p class="mb-0 body-txt">775 Members</p>
                                            </div>
                                        </div>

                                        <button class="btn primary-btn btn-block fw700">JOIN</button>
                                    </div>
                                </div>

                                <div class="item py-3 px-2">
                                    <div class="community-card mx-auto p-3 pt-4">
                                        <div class="card-img mb-1">
                                            <img src="{{ static_asset('assets/img/user-2.webp') }}" class="img-rounded" alt="Community Img">
                                        </div>
                                        <div class="card-data pt-3 pb-4">
                                            <h6 class="fw700 mb-1">Lodha Park</h6>
                                            <p class="mb-0 body-txt">Mumbai</p>
                                        </div>
                                        <div class="card-members pb-3">
                                            <div class="mbr-img">
                                                <img src="{{ static_asset('assets/img/user-3.webp') }}" alt="Community Img">
                                                <img src="{{ static_asset('assets/img/user-4.webp') }}" alt="Community Img">
                                                <img src="{{ static_asset('assets/img/user-1.webp') }}" alt="Community Img">
                                            </div>
                                            <div class="mbr-cnt">
                                                <p class="mb-0 body-txt">775 Members</p>
                                            </div>
                                        </div>

                                        <button class="btn primary-btn btn-block fw700">JOIN</button>
                                    </div>
                                </div>

                                <div class="item py-3 px-2">
                                    <div class="community-card mx-auto p-3 pt-4">
                                        <div class="card-img mb-1">
                                            <img src="{{ static_asset('assets/img/user-3.webp') }}" class="img-rounded" alt="Community Img">
                                        </div>
                                        <div class="card-data pt-3 pb-4">
                                            <h6 class="fw700 mb-1">Lodha Park</h6>
                                            <p class="mb-0 body-txt">Mumbai</p>
                                        </div>
                                        <div class="card-members pb-3">
                                            <div class="mbr-img">
                                                <img src="{{ static_asset('assets/img/user-4.webp') }}" alt="Community Img">
                                                <img src="{{ static_asset('assets/img/user-1.webp') }}" alt="Community Img">
                                                <img src="{{ static_asset('assets/img/user-2.webp') }}" alt="Community Img">
                                            </div>
                                            <div class="mbr-cnt">
                                                <p class="mb-0 body-txt">775 Members</p>
                                            </div>
                                        </div>

                                        <button class="btn primary-btn btn-block fw700">JOIN</button>
                                    </div>
                                </div>

                                <div class="item py-3 px-2">
                                    <div class="community-card mx-auto p-3 pt-4">
                                        <div class="card-img mb-1">
                                            <img src="{{ static_asset('assets/img/user-4.webp') }}" class="img-rounded" alt="Community Img">
                                        </div>
                                        <div class="card-data pt-3 pb-4">
                                            <h6 class="fw700 mb-1">Lodha Park</h6>
                                            <p class="mb-0 body-txt">Mumbai</p>
                                        </div>
                                        <div class="card-members pb-3">
                                            <div class="mbr-img">
                                                <img src="{{ static_asset('assets/img/user-1.webp') }}" alt="Community Img">
                                                <img src="{{ static_asset('assets/img/user-2.webp') }}" alt="Community Img">
                                                <img src="{{ static_asset('assets/img/user-3.webp') }}" alt="Community Img">
                                            </div>
                                            <div class="mbr-cnt">
                                                <p class="mb-0 body-txt">775 Members</p>
                                            </div>
                                        </div>

                                        <button class="btn primary-btn btn-block fw700">JOIN</button>
                                    </div>
                                </div>

                                <div class="item py-3 px-2">
                                    <div class="community-card mx-auto p-3 pt-4">
                                        <div class="card-img mb-1">
                                            <img src="{{ static_asset('assets/img/user-1.webp') }}" class="img-rounded" alt="Community Img">
                                        </div>
                                        <div class="card-data pt-3 pb-4">
                                            <h6 class="fw700 mb-1">Lodha Park</h6>
                                            <p class="mb-0 body-txt">Mumbai</p>
                                        </div>
                                        <div class="card-members pb-3">
                                            <div class="mbr-img">
                                                <img src="{{ static_asset('assets/img/user-2.webp') }}" alt="Community Img">
                                                <img src="{{ static_asset('assets/img/user-3.webp') }}" alt="Community Img">
                                                <img src="{{ static_asset('assets/img/user-4.webp') }}" alt="Community Img">
                                            </div>
                                            <div class="mbr-cnt">
                                                <p class="mb-0 body-txt">775 Members</p>
                                            </div>
                                        </div>

                                        <button class="btn primary-btn btn-block fw700">JOIN</button>
                                    </div>
                                </div>

                                <div class="item py-3 px-2">
                                    <div class="community-card mx-auto p-3 pt-4">
                                        <div class="card-img mb-1">
                                            <img src="{{ static_asset('assets/img/user-2.webp') }}" class="img-rounded" alt="Community Img">
                                        </div>
                                        <div class="card-data pt-3 pb-4">
                                            <h6 class="fw700 mb-1">Lodha Park</h6>
                                            <p class="mb-0 body-txt">Mumbai</p>
                                        </div>
                                        <div class="card-members pb-3">
                                            <div class="mbr-img">
                                                <img src="{{ static_asset('assets/img/user-3.webp') }}" alt="Community Img">
                                                <img src="{{ static_asset('assets/img/user-4.webp') }}" alt="Community Img">
                                                <img src="{{ static_asset('assets/img/user-1.webp') }}" alt="Community Img">
                                            </div>
                                            <div class="mbr-cnt">
                                                <p class="mb-0 body-txt">775 Members</p>
                                            </div>
                                        </div>

                                        <button class="btn primary-btn btn-block fw700">JOIN</button>
                                    </div>
                                </div>

                                <div class="item py-3 px-2">
                                    <div class="community-card mx-auto p-3 pt-4">
                                        <div class="card-img mb-1">
                                            <img src="{{ static_asset('assets/img/user-3.webp') }}" class="img-rounded" alt="Community Img">
                                        </div>
                                        <div class="card-data pt-3 pb-4">
                                            <h6 class="fw700 mb-1">Lodha Park</h6>
                                            <p class="mb-0 body-txt">Mumbai</p>
                                        </div>
                                        <div class="card-members pb-3">
                                            <div class="mbr-img">
                                                <img src="{{ static_asset('assets/img/user-4.webp') }}" alt="Community Img">
                                                <img src="{{ static_asset('assets/img/user-1.webp') }}" alt="Community Img">
                                                <img src="{{ static_asset('assets/img/user-2.webp') }}" alt="Community Img">
                                            </div>
                                            <div class="mbr-cnt">
                                                <p class="mb-0 body-txt">775 Members</p>
                                            </div>
                                        </div>

                                        <button class="btn primary-btn btn-block fw700">JOIN</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <button class="btn fw700 view-more-btn px-4 mb-3 mb-md-0">View more</button>

                    </div>
                </div>
            </div>

            <div class="pt-5 pb-3">
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

                                    <p class="fw700 text-center">- Vinod Shukla <span class="body-txt fsize12">CEO</span>
                                    </p>
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
@endsection
