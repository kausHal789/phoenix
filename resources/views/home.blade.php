@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                     {{-- <div class="row position-relative">

      <img src="{{ asset('img/2.jpg') }}" alt="Cover" class="img-fluid rounded position-absolute">
      <div class="container">
        <div class="row">
          {{ __('Artist') }}
        </div>
        <div class="row">
          <div class="col-3">
            <img src="{{ asset('img/1.jpg') }}" alt="Avtar" class="m-3 img-thumbnail img-fluid rounded w-25 h-auto position-absolute">
          </div>
        </div>
        
      </div>
  </div> --}}
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
