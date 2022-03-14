@extends('frontend.layouts.app', ['header_show' => true, 'header2' => false, 'footer' => true])

@section('content')
    <main class="main-tag main-tag-mt">
        <div class="container">
            <div class="row justify-content-center py-4">
                <div class="col-lg-5 col-md-6 col-sm-8 py-2 px-1">

                    <div class="wallet-amt-card">
                        <i class="fad fa-wallet text-white fa-2x"></i>
                        <p class="mb-1 text-white fsize13">SafeQu Balance</p>
                        <h4 class="fw700 mb-3 text-white">
                            {!! single_price(Auth::user()->balance) !!}
                        </h4>
                        @if (get_setting('razorpay') == 1)
                            <button class="btn btn-outline-light fsize14 fw500 px-4 btn-round btn-before-none"
                                data-toggle="modal" data-target="#addMoneyModal">
                                Add Money
                            </button>
                        @endif
                    </div>

                    <div class="trans-history pt-4 mt-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 fw700 title-txt">Transaction History</h6>
                            <i class="fad fa-filter fsize16 py-1 px-2" data-toggle="modal"
                                data-target="#filterTransModal"></i>
                        </div>

                        <div class="pt-4">
                            @foreach ($wallets as $key => $wallet)
                                <div class="transactions @if ($wallet->amount > 0) credit @else debit @endif">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <div class="indicater text-center">
                                            <i class="fad fa-long-arrow-left text-danger"></i>
                                            <i class="fad fa-long-arrow-right text-success"></i>
                                        </div>
                                        <div class="pl-2">
                                            <h6 class="mb-0 title-txt">
                                                @if ($wallet->amount > 0)
                                                    Credit
                                                @else
                                                    Debit
                                                @endif
                                            </h6>
                                            <p class="mb-0 body-txt">{{ dateFormat($wallet->created_at) }}</p>
                                        </div>
                                    </div>
                                    <h6 class="amount text-right mb-0">
                                        {!! single_price(abs($wallet->amount)) !!}
                                    </h6>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="aiz-pagination">
                        {{ $wallets->links() }}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection


@section('modal')
    <!-- Add Money to wallet Popup -->
    <div class="modal fade" id="addMoneyModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="addMoneyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="addMoneyModalLabel">Add money to wallet</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="fw700" aria-hidden="true">X</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="" action="{{ route('wallet.recharge') }}" method="post">
                        @csrf
                        <div class="py-2 text-center">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <ins class="currency-symbol">&#8377;</ins>
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="amount" id="wallet_amount"
                                    placeholder="0" />
                            </div>
                            <div class="amt-select text-center pb-3">
                                <button type="button" class="btn amt-btn my-1 btn-round" data-amt="100">100</button>
                                <button type="button" class="btn amt-btn my-1 btn-round" data-amt="500">500</button>
                                <button type="button" class="btn amt-btn my-1 btn-round" data-amt="1000">1000</button>
                                <button type="button" class="btn amt-btn my-1 btn-round" data-amt="2000">2000</button>
                            </div>
                            <input type="hidden" name="payment_option" value="razorpay">
                            <button class="btn primary-btn disabled" type="submit"> Add &nbsp;
                                <ins class="currency-symbol text-white fw400">&#8377;</ins>
                                <span id="btnAmt" class="text-white fw500">0</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Popup -->
    <div class="modal fade" id="filterTransModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="filterTransModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="filterTransModalLabel">Filter</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="fw700" aria-hidden="true">X</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="py-2 px-3">
                        <div class="form-group">
                            <label for="from_date" class="fw500">From Date</label>
                            <input type="date" class="form-control" name="from_date" id="from_date" />
                        </div>
                        <div class="form-group pb-3">
                            <label for="from_date" class="fw500">To Date</label>
                            <input type="date" class="form-control" name="to_date" id="to_date" />
                        </div>
                        <div class="form-group pb-3">
                            <label for="from_date" class="fw500">Transection Type</label>

                            <div class="switch">
                                <input type="radio" class="switch-input" name="view" value="all" id="all" checked>
                                <label for="all" class="switch-label switch-label-all mb-0">All</label>

                                <input type="radio" class="switch-input" name="view" value="1" id="income" />
                                <label for="income" class="switch-label switch-label-in">Income</label>

                                <input type="radio" class="switch-input" name="view" value="0" id="outgoings" />
                                <label for="outgoings" class="switch-label switch-label-out">Outgoings</label>

                                <span class="switch-selection"></span>
                            </div>

                        </div>

                        <button class="btn primary-btn btn-block"> Apply</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
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
        })
    </script>
@endsection
