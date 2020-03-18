@extends('layouts.admin')

@section('searchBar')
 <div class="row">
   <div class="col text-light h1 pt-3">
    Song Categories
   </div>
 </div>
@endsection


@section('content')
  <div class="container m-5">
    <form action="/category/store/admin" id="addCategory" method="POST">
      @csrf
      <div class="row m-3 text-center">
        <div class="col-8">
          <input type="text" name="name" id="name" 
            class="form-control @error('name') is-invalid @enderror" 
            placeholder="Category" required value="{{ old('name') }}" >
            @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>
        <div class="col-2">
          <button type="submit" class="btn btn-block btn-primary rounded-pill">create</button>
        </div>              
      </div>
    </form>

    <div class="row">

      @php
        $array = ['primary', 'success', 'secondary', 'danger', 'warning', 'info', 'light', 'dark'];
        $cnt = 0;
      @endphp

      @foreach ($categories as $category)
        <div class="col-2 m-3 alert alert-{{ $array[$cnt++] }} fade show" role="alert">
          @php( $cnt = ($cnt === 8) ? 0 : $cnt)
          <div class="alert-text">{{ $category->name }}</div>
          <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true"><i id="{{ $category->id }}" class="la la-close deleteCategory"></i></span>
            </button>
          </div>
        </div>    
      @endforeach

    </div>
  </div>
@endsection


@section('script-section')
  <script>
    $(document).on('click', '.deleteCategory', function () {
      var id = $(this).attr('id');
      console.log(id);
      $.ajax({
        url: "/category/" + id + "/admin", 
        method: 'GET',
        cache: false,
        success: function(_data) {
          console.log(_data);
        },
        error: function(err) {
          console.log(err);
        }
      })
    })

  </script>
@endsection