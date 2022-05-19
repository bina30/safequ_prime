<select class="form-control aiz-selectpicker" name="category_id" id="category_id"
        data-live-search="true">
    @foreach ($categories as $cat_variant)
        <option value="{{ $cat_variant->id }}">{{ $cat_variant->getTranslation('name') }}</option>
    @endforeach
</select>
