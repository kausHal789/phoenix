<div class="kt-subheader  kt-grid__item" id="kt_subheader">
  <div class="kt-container  kt-container--fluid ">
    <div class="kt-subheader__main">
      <h3 class="kt-subheader__title text-white text-capitalize">{{ $collectionType }}</h3>
      <span class="kt-subheader__separator kt-subheader__separator--v"></span>

      <div class="kt-subheader__toolbar" id="kt_subheader_search">
        <span class="kt-subheader__desc text-white" id="kt_subheader_total">
            {{ $collection->count() }} Total </span>

          <div class="kt-subheader__search">
            <div class="input-group">
              <input type="text" id="{{ $collectionType }}" class="form-control search_box" placeholder="Search...">
            </div>
          </div>
      </div>
    </div>
  </div>
</div>