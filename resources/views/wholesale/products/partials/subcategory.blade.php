<select class="form-control aiz-selectpicker" name="sub_category_id" id="sub_category_id"
        data-live-search="true" required onchange="loadCatVarieties(this)">
    <option value=""></option>
    @foreach ($categories as $sub_category)
        <option value="{{ $sub_category->id }}">{{ $sub_category->getTranslation('name') }}</option>
    @endforeach
</select>
