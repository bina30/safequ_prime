@extends('frontend.layouts.app', ['header_show' => true, 'header2' => false, 'footer' => true])

@section('content')
    <main class="main-tag main-tag-mt">
        <div class="container">
            <div class="row justify-content-center py-4 py-md-5">
                <div class="col-lg-5 col-md-7 col-sm-9 px-0">

                    <h5 class="fw700 title-txt mb-4">My orders</h5>

                    <div class="ord-item-card p-3 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="pr-2">
                                <p class="fw600 fsize15 title-txt mb-1">Order # 995622</p>
                                <p class="mb-0 lh-17">
                                    <span class="fsize13 body-txt ordered-qty"> 25Kg </span>
                                    <span class="fsize13 body-txt ordered-qty">
                                        &nbsp;&bull;&nbsp; 10 Dec, 2021 3:30
                                    </span>
                                </p>
                            </div>
                            <div class="img-name">
                                <div class="item-img item-img-sm text-center">
                                    <img src="{{ static_asset('assets/img/strawberry.png') }}" alt="Item image" />
                                </div>
                            </div>
                        </div>
                        <div class="delivery-status d-flex justify-content-between align-items-start pt-3">
                            <p class="mb-0 fsize13 status text-success">Estimated delivery on 21 Dec</p>
                            <a href="reviews.html">
                                <p class="mb-0 fsize15 rating-stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fad fa-star-half-alt"></i>
                                </p>
                            </a>
                        </div>
                    </div>

                    <div class="ord-item-card p-3 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="pr-2">
                                <p class="fw600 fsize15 title-txt mb-1">Order # 995622</p>
                                <p class="mb-0 lh-17">
                                    <span class="fsize13 body-txt ordered-qty"> 25Kg </span>
                                    <span class="fsize13 body-txt ordered-qty">
                                        &nbsp;&bull;&nbsp; 10 Dec, 2021 3:30
                                    </span>
                                </p>
                            </div>
                            <div class="img-name">
                                <div class="item-img item-img-sm text-center">
                                    <img src="{{ static_asset('assets/img/strawberry.png') }}" alt="Item image" />
                                </div>
                            </div>
                        </div>
                        <div class="delivery-status d-flex justify-content-between align-items-start pt-3">
                            <p class="mb-0 fsize13 status text-success">Estimated delivery on 21 Dec</p>

                            <a href="reviews.html">
                                <p class="mb-0 fsize15 rating-stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fad fa-star-half-alt"></i>
                                </p>
                            </a>
                        </div>
                    </div>

                    <div class="ord-item-card p-3 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="pr-2">
                                <p class="fw600 fsize15 title-txt mb-1">Order # 995622</p>
                                <p class="mb-0 lh-17">
                                    <span class="fsize13 body-txt ordered-qty"> 25Kg </span>
                                    <span class="fsize13 body-txt ordered-qty">
                                        &nbsp;&bull;&nbsp; 10 Dec, 2021 3:30
                                    </span>
                                </p>
                            </div>
                            <div class="img-name">
                                <div class="item-img item-img-sm text-center">
                                    <img src="{{ static_asset('assets/img/strawberry.png') }}" alt="Item image" />
                                </div>
                            </div>
                        </div>
                        <div class="delivery-status d-flex justify-content-between align-items-start pt-3">
                            <p class="mb-0 fsize13 status text-success">Estimated delivery on 21 Dec</p>

                            <a href="reviews.html">
                                <p class="mb-0 fsize15 rating-stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fad fa-star-half-alt"></i>
                                </p>
                            </a>
                        </div>
                    </div>

                    <div class="ord-item-card p-3 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="pr-2">
                                <p class="fw600 fsize15 title-txt mb-1">Order # 995622</p>
                                <p class="mb-0 lh-17">
                                    <span class="fsize13 body-txt ordered-qty"> 25Kg </span>
                                    <span class="fsize13 body-txt ordered-qty">
                                        &nbsp;&bull;&nbsp; 10 Dec, 2021 3:30
                                    </span>
                                </p>
                            </div>
                            <div class="img-name">
                                <div class="item-img item-img-sm text-center">
                                    <img src="{{ static_asset('assets/img/strawberry.png') }}" alt="Item image" />
                                </div>
                            </div>
                        </div>
                        <div class="delivery-status d-flex justify-content-between align-items-start pt-3">
                            <p class="mb-0 fsize13 status text-success">Estimated delivery on 21 Dec</p>

                            <a href="reviews.html">
                                <p class="mb-0 fsize15 rating-stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fad fa-star-half-alt"></i>
                                </p>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
@endsection
