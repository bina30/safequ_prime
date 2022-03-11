@extends('frontend.layouts.app', ['header_show' => true, 'header2' => true, 'footer' => true])

@section('content')
    <main class="main-tag mt-0">

        <div class="breadcrumbs">
            <div class="container">
                <h5 class="mb-0 fw700 text-white text-uppercase">Lodha Park Community</h5>
            </div>
        </div>

        <div class="content pb-5">
            <div class="container">
                <div class="row justify-content-center pb-4">
                    <div class="col-lg-5 col-md-7 col-sm-8 px-0">

                        <div class="user-data px-3 py-4">
                            <div class="img-name-sm px-3 mb-2">
                                <div class="user-img-sm m-0">
                                    <img src="{{ static_asset('assets/img/user-3.webp') }}" alt="User Img">
                                </div>
                                <div class="pl-3">
                                    <p class="fw600 fsize14 mb-1">Rahul Jain</p>
                                    <p class="body-txt fsize12 mb-1">rahuljain12@gmail.com</p>
                                    <p class="body-txt fsize12 mb-0">+91 987654321</p>
                                </div>
                            </div>
                            <div class="btns text-center pt-3">
                                <a href="#" class="fsize12 fw500">Track</a>
                                <a href="#" class="fsize12 fw500">Repeat</a>
                            </div>
                        </div>

                        <div class="ord-details py-4 px-3 primary-color-bg mt-4">
                            <p class="text-white fw600 mb-2">Order Id: &nbsp; <span class="text-white orderId">
                                    #65212021</span> </p>

                            <p class="text-white pb-2">Time: <span class="text-white dateTime">&bull;&nbsp; 10 Dec, 2021
                                    3:30</span> </p>

                            <p class="text-white fw600 mb-2">Delivery Address:</p>
                            <p class="text-white address mb-0">A-45, Radhakrishna Park, Old Padra Road, Akota, Vadodara
                                - 390020</p>
                        </div>

                        <div class="order-data pt-4 mt-3">
                            <table class="table w-100">
                                <thead>
                                    <tr>
                                        <th class="fw700 fsize13">Item Name</th>
                                        <th class="fw700 fsize13 text-right pr-4">Qty</th>
                                        <th class="fw700 fsize13 text-right pr-4">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>&bull; Strawberry White Goblin</td>
                                        <td class="text-right">5Kg</td>
                                        <td class="text-right">2000</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="2">Sub Total</th>
                                        <th class="text-right">2000</th>
                                    </tr>
                                    <tr>
                                        <th colspan="2" class="bt-0">Discount</th>
                                        <th class="text-right bt-0">- 200</th>
                                    </tr>
                                    <tr>
                                        <th colspan="2" class="bt-0">Shipping Charge</th>
                                        <th class="text-right bt-0">50</th>
                                    </tr>
                                    <tr>
                                        <th colspan="2" class="bt-0">Service Tax</th>
                                        <th class="text-right bt-0">80</th>
                                    </tr>
                                    <tr class="bb-1">
                                        <th colspan="2" class="fw600 fsize15 py-2">Total</th>
                                        <th class="fw600 fsize15 text-right py-2">
                                            <ins class="currency-symbol">&#8377;</ins>
                                            1930
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="pt-4 text-center">
                            <a href="products.html">
                                <button class="btn primary-btn btn-round px-5">
                                    Continue Shopping &nbsp;&nbsp;
                                    <i class="fal fa-long-arrow-right text-white"></i>
                                </button>
                            </a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection
