@extends('frontend.layouts.app', ['header_show' => true, 'header2' => false, 'footer' => true])

@section('content')
    <main class="main-tag main-tag-mt">
        <div class="container">
            <div class="row justify-content-center py-4">
                <div class="col-lg-5 col-md-6 col-sm-8 py-2 px-1">

                    <div class="wallet-amt-card">
                        <i class="fad fa-wallet text-white fa-2x"></i>
                        <p class="mb-1 text-white fsize13">SafeQu Balance</p>
                        <h4 class="fw700 mb-3 text-white"><ins class="currency-symbol">&#8377;</ins> 15,000</h4>
                        <button class="btn btn-outline-light fsize14 fw500 px-4 btn-round btn-before-none"
                            data-toggle="modal" data-target="#addMoneyModal">
                            Add Money
                        </button>
                    </div>

                    <div class="trans-history pt-4 mt-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 fw700 title-txt">Transaction History</h6>
                            <i class="fad fa-filter fsize16 py-1 px-2" data-toggle="modal"
                                data-target="#filterTransModal"></i>
                        </div>

                        <div class="pt-4">
                            <div class="transactions credit">
                                <div class="d-flex justify-content-start align-items-center">
                                    <div class="indicater text-center">
                                        <i class="fad fa-long-arrow-left text-danger"></i>
                                        <i class="fad fa-long-arrow-right text-success"></i>
                                    </div>
                                    <div class="pl-2">
                                        <h6 class="mb-0 title-txt">Credit</h6>
                                        <p class="mb-0 body-txt">10 Dec, 2021 3:30</p>
                                    </div>
                                </div>
                                <h6 class="amount text-right mb-0">
                                    <ins class="currency-symbol">&#8377;</ins>
                                    5000.25
                                </h6>
                            </div>

                            <div class="transactions debit">
                                <div class="d-flex justify-content-start align-items-center">
                                    <div class="indicater text-center">
                                        <i class="fad fa-long-arrow-left text-danger"></i>
                                        <i class="fad fa-long-arrow-right text-success"></i>
                                    </div>
                                    <div class="pl-2">
                                        <h6 class="mb-0 title-txt">Debit</h6>
                                        <p class="mb-0 body-txt">10 Dec, 2021 3:30</p>
                                    </div>
                                </div>
                                <h6 class="amount text-right mb-0">
                                    <ins class="currency-symbol">&#8377;</ins>
                                    5000.99
                                </h6>
                            </div>

                            <div class="transactions credit">
                                <div class="d-flex justify-content-start align-items-center">
                                    <div class="indicater text-center">
                                        <i class="fad fa-long-arrow-left text-danger"></i>
                                        <i class="fad fa-long-arrow-right text-success"></i>
                                    </div>
                                    <div class="pl-2">
                                        <h6 class="mb-0 title-txt">Credit</h6>
                                        <p class="mb-0 body-txt">10 Dec, 2021 3:30</p>
                                    </div>
                                </div>
                                <h6 class="amount text-right mb-0">
                                    <ins class="currency-symbol">&#8377;</ins>
                                    5000.25
                                </h6>
                            </div>

                            <div class="transactions debit">
                                <div class="d-flex justify-content-start align-items-center">
                                    <div class="indicater text-center">
                                        <i class="fad fa-long-arrow-left text-danger"></i>
                                        <i class="fad fa-long-arrow-right text-success"></i>
                                    </div>
                                    <div class="pl-2">
                                        <h6 class="mb-0 title-txt">Debit</h6>
                                        <p class="mb-0 body-txt">10 Dec, 2021 3:30</p>
                                    </div>
                                </div>
                                <h6 class="amount text-right mb-0">
                                    <ins class="currency-symbol">&#8377;</ins>
                                    5000.99
                                </h6>
                            </div>

                            <div class="transactions debit">
                                <div class="d-flex justify-content-start align-items-center">
                                    <div class="indicater text-center">
                                        <i class="fad fa-long-arrow-left text-danger"></i>
                                        <i class="fad fa-long-arrow-right text-success"></i>
                                    </div>
                                    <div class="pl-2">
                                        <h6 class="mb-0 title-txt">Debit</h6>
                                        <p class="mb-0 body-txt">10 Dec, 2021 3:30</p>
                                    </div>
                                </div>
                                <h6 class="amount text-right mb-0">
                                    <ins class="currency-symbol">&#8377;</ins>
                                    5000.99
                                </h6>
                            </div>

                            <div class="transactions debit">
                                <div class="d-flex justify-content-start align-items-center">
                                    <div class="indicater text-center">
                                        <i class="fad fa-long-arrow-left text-danger"></i>
                                        <i class="fad fa-long-arrow-right text-success"></i>
                                    </div>
                                    <div class="pl-2">
                                        <h6 class="mb-0 title-txt">Debit</h6>
                                        <p class="mb-0 body-txt">10 Dec, 2021 3:30</p>
                                    </div>
                                </div>
                                <h6 class="amount text-right mb-0">
                                    <ins class="currency-symbol">&#8377;</ins>
                                    5000.99
                                </h6>
                            </div>
                            <div class="transactions credit">
                                <div class="d-flex justify-content-start align-items-center">
                                    <div class="indicater text-center">
                                        <i class="fad fa-long-arrow-left text-danger"></i>
                                        <i class="fad fa-long-arrow-right text-success"></i>
                                    </div>
                                    <div class="pl-2">
                                        <h6 class="mb-0 title-txt">Credit</h6>
                                        <p class="mb-0 body-txt">10 Dec, 2021 3:30</p>
                                    </div>
                                </div>
                                <h6 class="amount text-right mb-0">
                                    <ins class="currency-symbol">&#8377;</ins>
                                    5000.25
                                </h6>
                            </div>

                            <div class="transactions credit">
                                <div class="d-flex justify-content-start align-items-center">
                                    <div class="indicater text-center">
                                        <i class="fad fa-long-arrow-left text-danger"></i>
                                        <i class="fad fa-long-arrow-right text-success"></i>
                                    </div>
                                    <div class="pl-2">
                                        <h6 class="mb-0 title-txt">Credit</h6>
                                        <p class="mb-0 body-txt">10 Dec, 2021 3:30</p>
                                    </div>
                                </div>
                                <h6 class="amount text-right mb-0">
                                    <ins class="currency-symbol">&#8377;</ins>
                                    5000.25
                                </h6>
                            </div>
                        </div>
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
                    <div class="py-2 text-center">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <ins class="currency-symbol">&#8377;</ins>
                                </span>
                            </div>
                            <input type="text" class="form-control" name="wallet_amount" id="wallet_amount"
                                placeholder="0" />
                        </div>
                        <div class="amt-select text-center pb-3">
                            <button class="btn amt-btn my-1 btn-round" data-amt="100">100</button>
                            <button class="btn amt-btn my-1 btn-round" data-amt="500">500</button>
                            <button class="btn amt-btn my-1 btn-round" data-amt="1000">1000</button>
                            <button class="btn amt-btn my-1 btn-round" data-amt="2000">2000</button>
                        </div>

                        <button class="btn primary-btn disabled"> Add &nbsp;
                            <ins class="currency-symbol text-white fw400">&#8377;</ins>
                            <span id="btnAmt" class="text-white fw500">0</span>
                        </button>
                    </div>
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

                        <button class="btn primary-btn btn-block"> Apply </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
