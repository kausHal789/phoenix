@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row position-relative">
    <img src="{{ asset('img/2.jpg') }}" alt="Cover" class="img-fluid rounded position-absolute">
    <div class="col-4 ">
      <img src="{{ asset('img/1.jpg') }}" alt="Avtar" class="align-self-end img-thumbnail img-fluid rounded w-50 h-auto position-absolute">

    </div>
  </div>
</div>
@endsection
