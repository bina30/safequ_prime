@extends('backend.layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">{{translate('Product Bulk Upload')}}</h5>
        </div>
        <div class="card-body">
            <div class="alert" style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                <strong>{{ translate('Step 1')}}:</strong>
                <p>1. {{translate('Download the skeleton file and fill it with proper data [Note: Please add only Price and StartDate and EndDate for orders in excel]')}}.</p>
                <p>2. {{translate('Once you have downloaded and filled the skeleton file, upload it in the form below and submit')}}.</p>
            </div>
            <br>
            <div class="">
{{--                <a href="{{ static_asset('download/product_bulk_demo.xlsx') }}" download><button class="btn btn-info">{{ translate('Download CSV')}}</button></a>--}}
                <a href="{{ route('product_bulk_export.index') }}" ><button class="btn btn-info">{{ translate('Download Products')}}</button></a>
            </div>
            <br>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6"><strong>{{translate('Upload Product File')}}</strong></h5>
        </div>
        <div class="card-body">
            <div class="alert" style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                <strong>{{ translate('Step 2')}}:</strong>
                <p>1. {{translate('Mandatory to select Community [Single / Multiple] and upload file')}}.</p>
                <p>2. {{translate('If any error occurs while uploading, a file with error comment will be available so you can download and make changes according to it and re-upload the file again.')}}.</p>
            </div>
            <form class="form-horizontal mt-4" action="{{ route('bulk_product_upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-md-2 col-from-label pt-2">{{translate('Community')}} <span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <select class="form-control aiz-selectpicker" name="community[]" id="community_id" data-live-search="true" multiple required>
                            @foreach ($sellers as $seller)
                                <option value="{{ $seller->id }}">{{ $seller->user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-9">
                        <div class="custom-file">
    						<label class="custom-file-label">
    							<input type="file" name="bulk_file" class="custom-file-input" required>
    							<span class="custom-file-name">{{ translate('Choose File')}}</span>
    						</label>
    					</div>
                    </div>
                </div>
                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-info">{{translate('Upload CSV')}}</button>
                </div>
            </form>
        </div>
    </div>

@endsection
