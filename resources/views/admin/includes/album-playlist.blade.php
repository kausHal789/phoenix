<div class="row mb-4 align-items-center">
  <div class="col-2"><img src="/storage/{{ $collection->img_url }}" class="w-25 h-auto float-right rounded-circle" alt=""></div>
  <div class="col-4">{{ $collection->name }}</div>
  {{-- <div class="col-2">{{ $collection->user->profile->name }}</div> --}}
  <div class="col-2">{{ $collection->created_at->diffForHumans() }}</div>
  <div class="col-1 text-center">
    @include('admin.includes.checkBox', ['collection' => $collection, 'collectionType' => $collectionType])
  </div>
</div>