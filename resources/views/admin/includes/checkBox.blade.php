{{-- <input type="checkbox" 
      id="{{ $collection->id }}-{{$collectionType}}" 
      @if (!$collection->deleted_at) checked @endif 
      data-toggle="toggle" 
      data-size="small" 
      data-onstyle="success" 
      data-offstyle="danger">
 --}}


 <label class="col-8 col-form-label">Status</label>
<div class="col-4 kt-align-right">
  <span class="kt-switch kt-switch--sm kt-switch--outline">
    <label title="status">
      <input type="checkbox" id="{{ $collection->id }}-{{$collectionType}}" class="switch" @if (!$collection->deleted_at) checked @endif name="quick_panel_notifications_1">
      <span></span>
    </label>
  </span>
</div>