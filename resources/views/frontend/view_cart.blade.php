@extends('frontend.layouts.app', ['header_show' => true, 'header2' => true, 'footer' => false])

@section('content')
    <main class="main-tag mt-0 cart-main-tag">

        <div class="breadcrumbs">
            <div class="container">
                <h5 class="mb-0 fw700 text-white text-uppercase">Cart Details</h5>
            </div>
        </div>

        <input type="hidden" id="item_count" value="{{ count($carts) }}">

        <div class="content pb-5" id="cart_summary">
            <div class="container py-4">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-7 px-1">
                        <h6 class="fw600 title-txt pb-2 mb-2">My Cart</h6>

                        @if($user_data && $user_data->address != '')
                            <div class="delivery-addr p-3 flex-astart-jstart mb-3">
                                <input type="checkbox" name="delivery_address" id="delivery_address" class="mr-2"
                                       checked/>
                                <span class="check-box"></span>

                                <label for="delivery_address" class="body-txt mb-0">
                                    {{ $user_data->address." ".$user_data->city." ".$user_data->state." ".$user_data->postal_code }}
                                </label>
                            </div>
                        @else
                            <div class="text-center">
                                <a href="{{ route('profile') }}">
                                    <button class="btn primary-btn btn-round py-1"> Add Address</button>
                                </a>
                            </div>
                            <hr>
                        @endif
                        <br>
                        <!-- Item Card -->

                        @php
                            $total = 0;
                            $shipping = 0;
                        @endphp
                        @foreach ($carts as $key => $cartItem)
                            @php
                                $product = \App\Models\Product::find($cartItem['product_id']);
                                $product_stock = $product->stocks->where('variant', $cartItem['variation'])->first();

                                $product_shipping_cost = $cartItem['shipping_cost'];
                                $shipping += $product_shipping_cost;

                                $sub_total = ($cartItem['price'] + $cartItem['tax']) * $cartItem['quantity'];
                                $total = $total + ($cartItem['price'] + $cartItem['tax']) * $cartItem['quantity'] ;
                            @endphp
                            <div class="crtord-itm-card mb-4 p-3">
                                <div class="img-name w-100">
                                    <div class="p-0 mxw-85px">
                                        <div class="item-img text-center">
                                            <img src="{{ uploaded_asset($product->photos) }}"
                                                 onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';"
                                                 alt="{{ $product->name }}"/>
                                        </div>
                                    </div>
                                    <div class="pl-3 w-100">
                                        <h6 class="fw700">{{ $product->name }}</h6>
                                        <div class="pt-2 d-flex">
                                            <p class="body-txt mb-0">
                                        <span class="act-price fw700">
                                            {!! single_price_web($sub_total) !!}
                                        </span>
                                                <i class="body-txt fsize12">&nbsp; <br class="sm"/>
                                                    ({!! single_price_web($product->unit_price) !!} / {{$product->unit}}
                                                    )
                                                </i>
                                            </p>
                                            <div class="action">
                                                <div class="item-count flex-acenter-jbtw">
                                                    <button class="btn"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown();"
                                                            type="button" data-field="quantity[{{ $cartItem['id'] }}]"
                                                            data-cart_id="{{ $cartItem['id'] }}">
                                                        <i class="fa fa-minus"></i>
                                                    </button>
                                                    <input class="quantity" min="1"
                                                           name="quantity[{{ $cartItem['id'] }}]"
                                                           value="{{ $cartItem['quantity'] }}"
                                                           type="number" id="quantity_{{ $cartItem['id'] }}"
                                                           value="{{ $cartItem['quantity'] }}" min="1"
                                                           max="{{ $product_stock->qty }}" readonly/>
                                                    <button class="btn"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp();"
                                                            type="button" data-field="quantity[{{ $cartItem['id'] }}]"
                                                            data-cart_id="{{ $cartItem['id'] }}">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                                <h6 class="mb-0 text-danger fw700 p-2 ml-2"
                                                    onclick="removeFromCartView(event, {{ $cartItem['id'] }})">X</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @php
                            $total += $shipping;
                        @endphp
                        @if($total == 0)
                            <div class="row">
                                <div class="col-xl-8 mx-auto">
                                    <div class="shadow-sm bg-white p-4 rounded">
                                        <div class="text-center p-3">
                                            <i class="las la-frown la-3x opacity-60 mb-3"></i>
                                            <h3 class="h4 fw-700">{{translate('Your Cart is empty')}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <form action="{{ route('payment.checkout') }}" class="form-default" role="form" method="POST"
                              id="checkout-form">
                            @csrf

                            @if(count($carts) > 0)
                                <input type="hidden" name="owner_id" value="{{  $carts[0]['owner_id'] }}">
                            @endif

                            @if($total > 0)
                            <!-- Amount -->
                                <div class="payings py-4">
                                    <hr class="b-1">
                                    <h6>
                                        <ins class="fw500">Shipping cost :</ins>
                                        <ins class="fw500 text-right"> {!! single_price_web($shipping) !!} </ins>
                                    </h6>
                                    <h5>
                                        <ins class="fw700">Total :</ins>
                                        <ins class="fw700 text-right"> {!! single_price_web($total) !!} </ins>
                                    </h5>
                                </div>

                                <!-- Payment Method -->
                                <div class="pay-method pb-3">

                                    @if(Auth::user())
                                        <div class="other-gatewy p-3 mb-3">
                                            <label for="pay-option2" class="label-radio mb-0 py-2 d-block">
                                                <input type="radio" id="pay-option2" name="payment_option"
                                                       value="wallet" tabindex="1"
                                                       @if($total > Auth::user()->balance) disabled
                                                       @else checked @endif />
                                                <span class="align-middle body-txt">
                                                    SafeQu balance
                                                </span>
                                                <br>
                                                <span class="align-middle body-txt cart_wallet_bal">
                                                    Available
                                                    <ins class="fw600 body-txt">{!! single_price_web(Auth::user()->balance) !!} </ins>
                                                    for Payment
                                                </span>
                                            </label>
                                        </div>
                                    @endif

                                    <div class="other-gatewy p-3 mb-3">
                                        <label for="pay-option1" class="label-radio mb-0 py-2 d-block">
                                            <input type="radio" id="pay-option1" name="payment_option" tabindex="1"
                                                   value="razorpay"
                                                   @if($total > Auth::user()->balance) checked @endif />
                                            <span class="align-middle body-txt">
                                            Razorpay
                                        </span>
                                        </label>
                                    </div>

                                </div>

                                <div class="p-3 pay-btn bt-1 flex-acenter-jbtw">
                                    <div class="total">
                                        <p class="fsize15 mb-1 body-txt">Total:</p>
                                        <h5 class="fw500 mb-0">{!! single_price_web($total) !!} </h5>
                                    </div>
                                    <button type="button" id="btn_pay_now" class="btn primary-btn btn-round py-1"
                                            onclick="submitOrder(this)"
                                            @if(count($carts) == 0 || $user_data->address == '') disabled @endif >Pay
                                        Now
                                    </button>
                                </div>
                            @endif

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
        $(document).ready(function () {
            updateNavCart($('#item_count').val());

            $('.item-count button').on('click', function () {
                let cart_id = $(this).data('cart_id');
                let qty = parseInt($("#quantity_" + cart_id).val());

                $("#itm-cnt").text(qty);

                if (qty >= 10) {
                    $("#itm-cnt").removeClass("d2 d3");
                    $("#itm-cnt").addClass("d2");
                }

                if (qty >= 100) {
                    $("#itm-cnt").removeClass("d2 d3");
                    $("#itm-cnt").addClass("d3");
                }

                (qty < 10) ? $("#itm-cnt").removeClass("d2 d3") : "";

                $('#btn_pay_now').attr('disabled', 'disabled');
                updateQuantity(cart_id, qty);
            })
        })

        function submitOrder(el) {
            $(el).prop('disabled', true);
            if ($('#delivery_address').is(":checked")) {
                $('#checkout-form').submit();
            } else {
                AIZ.plugins.notify('danger', '{{ translate('You need to select the address') }}');
                $(el).prop('disabled', false);
            }
        }

        function updateQuantity(cart_id, qty) {
            $.post('{{ route('cart.updateQuantity') }}', {
                _token: AIZ.data.csrf,
                id: cart_id,
                quantity: qty
            }, function (data) {
                updateNavCart(data.cart_count);
                $('#cart_summary').html('');
                $('#cart_summary').html(data.cart_view);
            });
        }

        function removeFromCartView(e, key) {
            e.preventDefault();
            $.post('{{ route('cart.removeFromCart') }}', {
                _token: AIZ.data.csrf,
                id: key
            }, function (data) {
                updateNavCart(data.cart_count);
                $('#cart_summary').html(data.cart_view);
                AIZ.plugins.notify('success', "{{ translate('Item has been removed from cart') }}");
            });
        }
    </script>

@endsection
