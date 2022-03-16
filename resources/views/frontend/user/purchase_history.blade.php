@extends('frontend.layouts.app', ['header_show' => true, 'header2' => false, 'footer' => true])

@section('content')
    <main class="main-tag main-tag-mt">
        <div class="container">
            <div class="row justify-content-center py-4 py-md-5">
                <div class="col-lg-5 col-md-7 col-sm-9 px-0">

                    <h5 class="fw700 title-txt mb-4">My orders</h5>

                    @foreach ($order_details as $detail)
                        <div class="ord-item-card p-3 mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('purchase_details', encrypt($detail->order->id)) }}">
                                    <div class="pr-2">
                                        <p class="fw600 fsize15 title-txt mb-1">Order # {{ $detail->order->code }}</p>
                                        <p class="mb-0 lh-17">
                                            <span class="fsize13 body-txt ordered-qty"> {{ $detail->product->unit_price . ' ' . $detail->product->unit }} </span>
                                            <span class="fsize13 body-txt ordered-qty">
                                                &nbsp;&bull;&nbsp;
                                                {{ date("d F, Y H:i", $detail->order->date) }}
                                            </span>
                                        </p>
                                    </div>
                                </a>
                                <div class="img-name">
                                    <div class="item-img item-img-sm text-center">
                                        <img src="{{ uploaded_asset($detail->product->photos) }}" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';" alt="{{ $detail->product->name }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="delivery-status d-flex justify-content-between align-items-start pt-3">
                                <p class="mb-0 fsize13 status text-success">
                                    Estimated delivery on {{ date("d F", strtotime($detail->product->purchase_end_date. "+7 day")) }}
                                </p>
                                @if(Auth::check())
                                    @php
                                        $commentable = false;
                                    @endphp
                                    @if($detail->order != null && $detail->order->user_id == Auth::user()->id && $detail->delivery_status == 'delivered')
                                        @php
                                            $commentable = true;
                                        @endphp
                                    @endif

                                    @if ($commentable)
                                        <a href="{{ route('product_reviews', $detail->product->id) }}">
                                            <p class="mb-0 fsize15 rating-stars">
                                                {!! renderStarRating($detail->product->rating) !!}
                                            </p>
                                        </a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
@endsection
