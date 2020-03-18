@extends('layouts.admin')


@section('searchBar')
 <div class="row">
   <div class="col text-light h1 pt-3">
    Feedbacks
   </div>
 </div>
@endsection


@section('content')
<section>
  <div class="container mt-5">
    <div class="row">
      <div class="col order-lg-1 order-xl-1">
        <div class="kt-portlet kt-portlet--height-fluid kt-widget-13">
          <div class="kt-portlet__body">
            <div id="kt-widget-slider-13-2" class="kt-slider carousel slide pointer-event" data-ride="carousel" data-interval="4000">
              <div class="kt-slider__head">
                <div class="kt-slider__label">Feedbacks</div>
                <div class="kt-slider__nav">
                  <a class="kt-slider__nav-prev carousel-control-prev" href="#kt-widget-slider-13-2" role="button" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                  </a>
                  <a class="kt-slider__nav-next carousel-control-next" href="#kt-widget-slider-13-2" role="button" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                  </a>
                </div>
              </div>
              <div class="carousel-inner">

                @foreach ($singalFeedbacks as $feedback)
                @include('admin.includes.feedback', ['feedback' => $feedback, 'active' => true])
                @endforeach

                @foreach ($latestFeedbacks as $feedback)
                @include('admin.includes.feedback', ['feedback' => $feedback])
                @endforeach

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row m-5">
      
      @foreach ($feedbacks as $feedback)

      <div class="col-12 mb-2 bg-white p-5 rounded">        
        <div class="carousel-item kt-slider__body active">
          <div class="kt-widget-13">
            <div class="kt-widget-13__body">
              <div class="kt-widget-13__title">{{ $feedback->name }}</div>
              <div class="kt-widget-13__title">{{ $feedback->email }}</div>
              <div class="kt-widget-13__desc">
                {{ $feedback->description }}
              </div>
            </div>
            <div class="kt-widget-13__foot">
              <div class="kt-widget-13__progress">
                <div class="kt-widget-13__progress-info">
                  <div class="kt-widget-13__progress-status">
                    {{ date('M d, Y', strtotime($feedback->created_at)) }}
                  </div>
                  <div class="kt-widget-13__progress-value">Mobile: <span>{{ $feedback->phone }}</span></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      @endforeach
    </div>


  </div>
</section>
@endsection