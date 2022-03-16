@extends('frontend.layouts.app', ['header_show' => true, 'header2' => true, 'footer' => false])

@php
    $total = 0;
@endphp

@section('content')
    <main class="main-tag mt-0">

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

                        @if($user_data)
                            <div class="delivery-addr p-3 flex-astart-jstart mb-3">
                                <input type="checkbox" name="delivery_address" id="delivery_address" class="mr-2"
                                       checked />
                                <span class="check-box"></span>

                                <label for="delivery_address" class="body-txt mb-0">
                                    {{ $user_data->address." ".$user_data->city." ".$user_data->state." ".$user_data->postal_code }}
                                </label>
                            </div>
                        @endif
                        <br>
                        <!-- Item Card -->

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
                                            <img src="{{ uploaded_asset($product->photos) }}" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';" alt="{{ $product->name }}" />
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
                                                    ({!! single_price($product->unit_price) !!} / {{$product->unit}})
                                                </i>
                                            </p>
                                            <div class="action">
                                                <div class="item-count flex-acenter-jbtw">
                                                    <button class="btn"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown();"
                                                            type="button" data-field="quantity[{{ $cartItem['id'] }}]" data-cart_id="{{ $cartItem['id'] }}">
                                                        <i class="fa fa-minus"></i>
                                                    </button>
                                                    <input class="quantity" min="1" name="quantity[{{ $cartItem['id'] }}]" value="{{ $cartItem['quantity'] }}"
                                                           type="number" id="quantity_{{ $cartItem['id'] }}" value="{{ $cartItem['quantity'] }}" min="1" max="{{ $product_stock->qty }}" readonly />
                                                    <button class="btn"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp();"
                                                            type="button" data-field="quantity[{{ $cartItem['id'] }}]" data-cart_id="{{ $cartItem['id'] }}">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                                <h6 class="mb-0 text-danger fw700 p-2 ml-2" onclick="removeFromCartView(event, {{ $cartItem['id'] }})">X</h6>
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

                                <div class="other-gatewy p-3 mb-3">
                                    <label for="pay-option1" class="label-radio mb-0 py-2 d-block">
                                        <input type="radio" id="pay-option1" name="payment_option" tabindex="1" value="razorpay" checked />
                                        <span class="align-middle body-txt">
                                            Razorpay
                                        </span>
                                    </label>
                                </div>

                                @if(Auth::user())
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
                                @endif

                            </div>

                            <div class="p-3 pay-btn bt-1 flex-acenter-jbtw">
                                <div class="total">
                                    <p class="fsize15 mb-1 body-txt">Total:</p>
                                    <h5 class="fw500 mb-0"><ins class="currency-symbol">&#8377;</ins> {{ $total }}</h5>
                                </div>
                                 <button id="btn_pay_now" class="btn primary-btn btn-round py-1" onclick="submitOrder(this)" @if(count($carts) == 0) disabled @endif >Pay Now</button>
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
        $(document).ready(function() {
            updateNavCart($('#item_count').val());

            $('.item-count button').on('click', function() {
                let cart_id = $(this).data('cart_id');
                let qty = parseInt($("#quantity_"+cart_id).val());

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

                $('#btn_pay_now').attr('disabled', 'disabled');
                updateQuantity(cart_id, qty);
            })
        })

        function submitOrder(el){
            $(el).prop('disabled', true);
            if($('#delivery_address').is(":checked")){
                $('#checkout-form').submit();
            }else{
                AIZ.plugins.notify('danger','{{ translate('You need to select the address') }}');
                $(el).prop('disabled', false);
            }
        }

        function updateQuantity(cart_id, qty){
            $.post('{{ route('cart.updateQuantity') }}', {
                _token   :  AIZ.data.csrf,
                id       :  cart_id,
                quantity :  qty
            }, function(data){
                updateNavCart(data.cart_count);
                $('#cart_summary').html('');
                $('#cart_summary').html(data.cart_view);
                $('#btn_pay_now').removeAttr('disabled');
            });
        }

        function removeFromCartView(e, key){
            e.preventDefault();
            $.post('{{ route('cart.removeFromCart') }}', {
                _token  : AIZ.data.csrf,
                id      :  key
            }, function(data){
                updateNavCart(data.cart_count);
                $('#cart_summary').html(data.cart_view);
                AIZ.plugins.notify('success', "{{ translate('Item has been removed from cart') }}");
            });
        }
    </script>

@endsection
