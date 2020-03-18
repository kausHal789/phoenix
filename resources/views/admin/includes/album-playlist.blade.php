<div class="col-xl-4">
  <div class="kt-portlet kt-portlet--contain">
      <div class="kt-blog-grid-v2"
        style="background-image: url(/storage/{{ $collection->img_url }})">
        <div class="kt-blog-grid-v2__tag text-capitalize">{{ $collectionType }}</div>
        <div class="kt-blog-grid-v2__tag">
          @include('admin.includes.checkBox', ['collection' => $collection, 'collectionType' => 'album'])
        </div>

        <div class="kt-blog-grid-v2__body">
          <div class="kt-blog-grid-v2__date">
            {{ date('M d, Y', strtotime($collection->created_at)) }}
          </div>
          <div class="kt-blog-grid-v2__link">
            <h2 class="kt-blog-grid-v2__title">
              {{ $collection->name }}
            </h2>
          </div>
        </div>
      </div>
  </div>
</div>