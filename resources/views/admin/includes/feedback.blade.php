<div class="carousel-item kt-slider__body @if(isset($active)) active @endif">
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