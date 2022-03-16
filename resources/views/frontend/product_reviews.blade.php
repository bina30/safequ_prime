@extends('frontend.layouts.app', ['header_show' => false, 'header2' => false, 'footer' => false])

@section('content')
    <header class="inner-header bg-white py-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-sm-8 px-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <a class="nav-logo" href="javascript:history.back()">
                            <i class="fad fa-chevron-left pl-2 pr-3 py-2"></i>
                        </a>
                        <a class="nav-logo" href="{{ route('home') }}">
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
            <div class="row justify-content-center py-4">
                <div class="col-lg-5 col-md-7 col-sm-8 px-1 pb-2">
                    <div class="review-itm-card p-3">
                        <div class="img-name">
                            <div class="item-img text-center">
                                <img src="assets/img/strawberry.png" alt="Item image" />
                            </div>
                            <div class="pl-3">
                                <h6 class="fw700">Strawberry White Goblin</h6>
                                <p class="fw600 body-txt mb-2">Variety: Ac Valley Sunset</p>
                                <p class="rating-stars mb-0 fsize16">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fad fa-star-half-alt"></i>
                                </p>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="review-card py-2 text-center">
                        <div class="user-img mb-3">
                            <img src="{{ Auth::user()->avatar_original }}" alt="User Img"
                                onerror="this.onerror=null;this.src='https://cdn.iconscout.com/icon/free/png-256/avatar-370-456322.png'">
                        </div>
                        <p class="fw600 fsize15 title-txt mb-1">{{ Auth::user()->name }}</p>
                        <p class="fw500 fsize13 light-text mb-1">Phone No.: {{ Auth::user()->phone }}</p>

                        <form action="" class="review-form py-3">
                            <div class="form-group mb-2">
                                <div class="rating-group">
                                    <label aria-label="1 star" class="rating__label" for="rating-1"><i
                                            class="rating__icon rating__icon--star fa fa-star"></i></label>
                                    <input class="rating__input" name="rating" id="rating-1" value="1" type="radio" />
                                    <label aria-label="2 stars" class="rating__label" for="rating-2"><i
                                            class="rating__icon rating__icon--star fa fa-star"></i></label>
                                    <input class="rating__input" name="rating" id="rating-2" value="2" type="radio" />
                                    <label aria-label="3 stars" class="rating__label" for="rating-3"><i
                                            class="rating__icon rating__icon--star fa fa-star"></i></label>
                                    <input class="rating__input" name="rating" id="rating-3" value="3" type="radio" />
                                    <label aria-label="4 stars" class="rating__label" for="rating-4"><i
                                            class="rating__icon rating__icon--star fa fa-star"></i></label>
                                    <input class="rating__input" name="rating" id="rating-4" value="4" type="radio"
                                        checked />
                                    <label aria-label="5 stars" class="rating__label" for="rating-5"><i
                                            class="rating__icon rating__icon--star fa fa-star"></i></label>
                                    <input class="rating__input" name="rating" id="rating-5" value="5" type="radio" />
                                </div>
                            </div>

                            <div class="form-group">
                                <textarea name="review" id="review" class="form-control" rows="3" placeholder="Additional comments..."></textarea>
                            </div>

                            <button type="submit" class="btn primary-btn">Submit Review</button>
                        </form>

                        <hr>

                        <div class="user-review text-left bb-1 mb-2">
                            <div class="data py-3">
                                <div class="user">
                                    <img src="assets/img/user-1.webp" alt="User img">
                                    <div class="pl-3">
                                        <p class="fw600 fsize15 title-txt mb-1">Rahul Jain</p>
                                        <p class="rating-stars mb-0 fsize15">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </p>
                                    </div>
                                </div>
                                <p class="fw600 fsize13 body-txt mb-0">1 day ago</p>
                            </div>
                            <p class="body-txt fsize13">Hello, Lorem ipsum dolor sit amet consectetur adipisicing elit
                                unde praesentium at aspernatur aut. </p>
                        </div>

                        <div class="user-review text-left bb-1 mb-2">
                            <div class="data py-3">
                                <div class="user">
                                    <img src="assets/img/user-3.webp" alt="User img">
                                    <div class="pl-3">
                                        <p class="fw600 fsize15 title-txt mb-1">Robart Carol</p>
                                        <p class="rating-stars mb-0 fsize15">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </p>
                                    </div>
                                </div>
                                <p class="fw600 fsize13 body-txt mb-0">3 days ago</p>
                            </div>
                            <p class="body-txt fsize13">Hello, Lorem ipsum dolor sit amet consectetur adipisicing elit
                                unde praesentium at aspernatur aut. </p>
                        </div>

                        <div class="user-review text-left bb-1 mb-2">
                            <div class="data py-3">
                                <div class="user">
                                    <img src="assets/img/user-4.webp" alt="User img">
                                    <div class="pl-3">
                                        <p class="fw600 fsize15 title-txt mb-1">Angela</p>
                                        <p class="rating-stars mb-0 fsize15">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </p>
                                    </div>
                                </div>
                                <p class="fw600 fsize13 body-txt mb-0">6 days ago</p>
                            </div>
                            <p class="body-txt fsize13">Hello, Lorem ipsum dolor sit amet consectetur adipisicing elit
                                unde praesentium at aspernatur aut. </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script>
    </script>
@endsection
