@extends('backend.layouts.app')

@section('content')
    <div class="aiz-titlebar text-left mt-2 mb-3">
        <h5 class="mb-0 h6">{{translate('Add New Customer')}}</h5>
    </div>
    <div class="">
        <form class="form form-horizontal mar-top" action="{{route('customers.store_customer')}}" method="POST"
              enctype="multipart/form-data" id="choice_form">
            <div class="row gutters-5">
                <div class="col-lg-12">
                    @csrf
                    <input type="hidden" name="country_code" id="country_code">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 h6">{{translate('Information')}}</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">{{translate('Customer Name')}} <span
                                        class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="name"
                                           placeholder="{{ translate('Customer Name') }}"
                                           required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">{{translate('Community')}} <span
                                        class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <select class="form-control aiz-selectpicker" name="community_id" id="community_id"
                                            data-live-search="true" required>
                                        <option value=""></option>
                                        @foreach ($sellers as $seller)
                                            <option value="{{ $seller->user->id }}">{{ $seller->user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">{{translate('Mobile No')}}</label>
                                <div class="col-md-8 phone-form-group">
                                    <input type="tel" id="phone-code" required maxlength="10" minlength="10"
                                           class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                           value="{{ old('phone') }}" placeholder="" name="phone" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">{{translate('Email')}}</label>
                                <div class="col-md-8">
                                    <input type="email" class="form-control" name="email"
                                           placeholder="{{ translate('customer@text.com') }}"
                                           required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-from-label">Flat No</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="address" id="address" required/>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="col-12">
                    <div class="btn-toolbar float-right mb-3" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group" role="group" aria-label="Second group">
                            <button type="submit" name="button" value="publish"
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

            var valid = true;

            if (!valid) {
                e.preventDefault();

                // Reactivate the button if the form was not submitted
                $("button[type='submit']").button.prop('disabled', false);
            }
        });

        if ($("#phone-code").length) {
            var countryData = window.intlTelInputGlobals.getCountryData(),
                input = document.querySelector("#phone-code");

            for (var i = 0; i < countryData.length; i++) {
                var country = countryData[i];
                if (country.iso2 == 'bd') {
                    country.dialCode = '88';
                }
            }

            var iti = intlTelInput(input, {
                separateDialCode: true,
                utilsScript: "{{ static_asset('assets/js/intlTelutils.js') }}?1590403638580",
                onlyCountries: ['in'],
                customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
                    // if (selectedCountryData.iso2 == 'bd') {
                    return "81234 56789";
                    // }
                    return selectedCountryPlaceholder;
                }
            });

            var country = iti.getSelectedCountryData();
            $('input[name=country_code]').val(country.dialCode);

            input.addEventListener("countrychange", function(e) {
                // var currentMask = e.currentTarget.placeholder;

                var country = iti.getSelectedCountryData();
                $('input[name=country_code]').val(country.dialCode);

            });
        }


    </script>

@endsection
