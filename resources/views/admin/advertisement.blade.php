@extends('layouts.admin')

@section('searchBar')
 <div class="row">
   <div class="col text-light h1 pt-3">
    Advertisements
   </div>
 </div>
@endsection

@section('content')
  <div class="container">
    <div class="row mt-5">

      @forelse ($advertisements as $advertisement)
          
      <div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">
        <div class="kt-portlet kt-portlet--height-fluid kt-widget-12">
          <div class="kt-portlet__body">
            <div class="kt-widget-12__body">
              <div class="kt-widget-12__head">
                <div class="kt-widget-12__date kt-widget-12__date--success">
                  <span class="kt-widget-12__day">{{ date('d', strtotime($advertisement->created_at)) }}</span>
                  <span class="kt-widget-12__month">{{ date('M', strtotime($advertisement->created_at)) }}</span>
                </div>
                <div class="kt-widget-12__label">
                  <h3 class="kt-widget-12__title">{{ $advertisement->title }}</h3>
                  <span class="kt-widget-12__desc"><a href="{{ $advertisement->url }}" target="_blank">{{ $advertisement->url }}</a></span>
                </div>
              </div>
              
            </div>
          </div>
          <div class="kt-portlet__foot kt-portlet__foot--md">
            <div class="kt-portlet__foot-wrapper">
              <div class="kt-portlet__foot-info">
                <a href="/advertisement/{{ $advertisement->id }}" class="btn btn-warning btn-sm btn-bold btn-upper editAdvertisement">Edit</a>
              </div>
              <div class="kt-portlet__foot-toolbar">
                <form action="/advertisement/{{ $advertisement->id }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm btn-bold btn-upper">Delete</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      @empty
          
      @endforelse

    </div>
  </div>
@endsection


@section('script-section')
  @if (isset($editadvertisement))
  <script>
    $(document).ready(function() {
      $('#advertisementForm').click();
    });
  </script>    
  @endif
  
@endsection