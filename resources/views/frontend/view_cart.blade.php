@extends('frontend.layouts.app', ['header_show' => true, 'header2' => true, 'footer' => false])

@section('content')
    <main class="main-tag mt-0">

        <div class="breadcrumbs">
            <div class="container">
                <h5 class="mb-0 fw700 text-white text-uppercase">Cart Details</h5>
            </div>
        </div>

        <div class="content pb-5">
            <div class="container py-4">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-7 px-1">
                        <h6 class="fw600 title-txt pb-2 mb-2">My Cart</h6>

                        <div class="delivery-addr p-3 flex-astart-jstart mb-3">
                            <input type="checkbox" name="delivery_address" id="delivery_address" class="mr-2"
                                checked />
                            <span class="check-box"></span>

                            <label for="delivery_address" class="body-txt mb-0">
                                {{ $user_data->address." ".$user_data->city." ".$user_data->state." ".$user_data->postal_code }}
                            </label>
                        </div>
                        <br>
                        <!-- Item Card -->

                        @php
                            $total = 0;
                        @endphp
                        @foreach ($carts as $key => $cartItem)
                            @php
                                $product = \App\Models\Product::find($cartItem['product_id']);
                                $product_stock = $product->stocks->where('variant', $cartItem['variation'])->first();
                                $sub_total = ($cartItem['price'] + $cartItem['tax']) * $cartItem['quantity'];
                                $total = $total + ($cartItem['price'] + $cartItem['tax']) * $cartItem['quantity'];
                            @endphp
                            <div class="crtord-itm-card mb-4 p-3">
                                <div class="img-name w-100">
                                    <div class="p-0 mxw-85px">
                                        <div class="item-img text-center">
                                            <img src="{{ uploaded_asset($product->photos) }}" alt="Item image" />
                                        </div>
                                    </div>
                                    <div class="pl-3 w-100">
                                        <h6 class="fw700">{{ $product->name }}</h6>
                                        <div class="pt-2 d-flex">
                                            <p class="body-txt mb-0">
                                            <span class="act-price fw700">
                                                {!! single_price($sub_total) !!}
                                            </span>
                                                <i class="body-txt fsize12">&nbsp; <br class="sm" />
                                                    ({!! single_price($product->unit_price) !!} / $product->unit)
                                                </i>
                                            </p>
                                            <div class="action">
                                                <div class="item-count">
                                                    <button class="btn"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown();"
                                                            type="button"><i class="fa fa-minus"></i></button>
                                                    <input class="quantity" min="1" name="quantity" value="{{ $cartItem['quantity'] }}"
                                                           type="number" id="quantity" readonly />
                                                    <button class="btn"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp();"
                                                            type="button"><i class="fa fa-plus"></i></button>
                                                </div>
                                                <h6 class="mb-0 text-danger fw700 p-2 ml-2">X</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <form action="{{ route('payment.checkout') }}" class="form-default" role="form" method="POST" id="checkout-form">
                            @csrf

                            @if(count($carts) > 0)
                                <input type="hidden" name="owner_id" value="{{  $carts[0]['owner_id'] }}">
                            @endif

                            <!-- Amount -->
                            <div class="payings py-4">
    <!--                            <h6>
                                    <ins class="fw500">SubTotal : </ins>
                                    <ins class="text-right">1249.99</ins>
                                </h6>-->
    <!--                            <h6>
                                    <ins class="fw500">Shipping : </ins>
                                    <ins class="text-right">99.99</ins>
                                </h6>-->
                                <hr class="b-1">
                                <h5>
                                    <ins class="fw700">Total : </ins>
                                    <ins class="fw700 text-right"> {!! single_price($total) !!} </ins>
                                </h5>
                            </div>

                            <!-- Payment Method -->
                            <div class="pay-method pb-3">

    <!--                            <div class="pay-by-wallet p-3 flex-acenter-jstart mb-4">
                                    <input type="checkbox" name="wallet_pay" id="wallet_pay" class="mr-2"
                                    @if($total > Auth::user()->balance) disabled @endif />
                                    <span class="check-box"></span>

                                    <label for="wallet_pay" class="body-txt mb-0">Use your
                                        <span class="fw500 fsize13">
                                            <ins class="currency-symbol">&#8377;</ins>
                                            {!! single_price(Auth::user()->balance) !!}
                                        </span>
                                        SafeQu balance
                                    </label>
                                </div>-->

                                <div class="other-gatewy p-3 mb-3">
                                    <label for="pay-option1" class="label-radio mb-0 py-2 d-block">
                                        <input type="radio" id="pay-option1" name="payment_option" tabindex="1" value="razorpay" checked />
                                        <span class="align-middle body-txt">
                                            Razorpay
                                        </span>
                                    </label>
                                </div>

                                <div class="other-gatewy p-3 mb-3">
                                    <label for="pay-option2" class="label-radio mb-0 py-2 d-block">
                                        <input type="radio" id="pay-option2" name="payment_option" value="wallet" tabindex="1"
                                               @if($total > Auth::user()->balance) disabled @endif />
                                        <span class="align-middle body-txt">
                                            Use your
                                            <ins class="fw600 body-txt">{!! single_price(Auth::user()->balance) !!} </ins>
                                            SafeQu balance
                                        </span>
                                    </label>
                                </div>

                            </div>

                            <div class="p-3 pay-btn bt-1 flex-acenter-jbtw">
                                <div class="total">
                                    <p class="fsize15 mb-1 body-txt">Total:</p>
                                    <h5 class="fw500 mb-0"><ins class="currency-symbol">&#8377;</ins> {{ $total }}</h5>
                                </div>
                                 <button class="btn primary-btn btn-round py-1" onclick="submitOrder(this)" @if(count($carts) == 0) disabled @endif >Pay Now</button>

<!--                                <a href="thank-you.html" class="btn primary-btn btn-round py-1 text-white">Pay Now</a>-->
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('modal')
@endsection

@section('script')

    <script type="text/javascript">
        function submitOrder(el){
            $(el).prop('disabled', true);
            if($('#delivery_address').is(":checked")){
                $('#checkout-form').submit();
            }else{
                AIZ.plugins.notify('danger','{{ translate('You need to select the address') }}');
                $(el).prop('disabled', false);
            }
        }
    </script>

@endsection
