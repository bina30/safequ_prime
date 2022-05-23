@extends('backend.layouts.app')

@section('content')
    <div class="aiz-titlebar text-left mt-2 mb-3">
        <h5 class="mb-0 h6">{{translate('Add New Product')}}</h5>
    </div>
    <div class="">
        <form class="form form-horizontal mar-top" action="{{route('customers.add_customer_order')}}" method="POST"
              enctype="multipart/form-data" id="choice_form">
            <div class="row gutters-5">
                <div class="col-lg-12">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <input type="hidden" name="owner_id" value="{{ $seller->user_id }}">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 h6">{{translate('Product Information')}}</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">{{translate('Customer')}} <span
                                        class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="name"
                                           placeholder="{{ translate('Customer Name') }}" value="{{ $user->name }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row" id="category">
                                <label class="col-md-3 col-from-label">{{translate('Proudct')}} <span
                                        class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <select class="form-control aiz-selectpicker" name="proudct_id" id="proudct_id"
                                            data-live-search="true" required>
                                        <option value=""></option>
                                        @foreach ($active_products as $product)
                                            <option value="{{ $product->id }}">{{ $product->product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">{{translate('Quantity')}} <span
                                        class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="number" lang="en" class="form-control" name="quantity" value="1"
                                           min="0.1" step="0.001" required>
                                </div>
                            </div>
                            <div class="form-group row" id="category">
                                <label class="col-md-3 col-from-label">{{translate('Payment Status')}} <span
                                        class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <select class="form-control aiz-selectpicker" name="payment_status" id="payment_status"
                                            data-live-search="true" required onchange="checkPaymentDetails(this)">
                                        <option value="unpaid">{{translate('Un-Paid')}}</option>
                                        <option value="paid">{{translate('Paid')}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">{{translate('Payment Type')}}</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="payment_type" id="payment_type"
                                           placeholder="{{ translate('G-Pay etc..') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">{{translate('Transaction Id')}}</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="transaction_id" id="transaction_id"
                                           placeholder="{{ translate('GP123456 etc..') }}">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="col-12">
                    <div class="btn-toolbar float-right mb-3" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group" role="group" aria-label="Second group">
                            <button type="submit" name="button"
                                    class="btn btn-success">{{ translate('Save') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('script')

    <script type="text/javascript">

        "use strict";

        $('form').bind('submit', function (e) {
            // Disable the submit button while evaluating if the form should be submitted
            $("button[type='submit']").prop('disabled', true);

            let valid = true;

            if (!valid) {
                e.preventDefault();

                // Reactivate the button if the form was not submitted
                $("button[type='submit']").button.prop('disabled', false);
            }
        });

        function checkPaymentDetails(obj) {
            if ($(obj).val() == 'paid') {
                $('#payment_type').attr('required', true);
                $('#transaction_id').attr('required', true);
            } else {
                $('#payment_type').removeAttr('required');
                $('#transaction_id').removeAttr('required');
            }
        }

    </script>

@endsection
