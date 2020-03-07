<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <style>
      .container {min-width:992px!important}
      .card {position:relative;display:-ms-flexbox;display:flex;-ms-flex-direction:column;flex-direction:column;min-width:0;word-wrap:break-word;background-color:#fff;background-clip:border-box;border:1px solid rgba(0,0,0,.125);border-radius:.25rem}
      .card-header{padding:.75rem 1.25rem;margin-bottom:0;background-color:rgba(0,0,0,.03);border-bottom:1px solid rgba(0,0,0,.125)}
      .m-5{margin:3rem!important}
      .font-weight-bold{font-weight:700!important}
      .h2{font-size:2rem;margin-bottom:.5rem;font-weight:500;line-height:1.2}
      .text-warning{color:#ffc107!important}
      .card-body{-ms-flex:1 1 auto;flex:1 1 auto;min-height:1px;padding:1.25rem}
      .row{display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;margin-right:-15px;margin-left:-15px}
      .col-2{-ms-flex:0 0 16.666667%;flex:0 0 16.666667%;max-width:16.666667%;}
      .col-2,.col-4,.col-6{position:relative;width:100%;padding-right:15px;padding-left:15px}
      .col{-ms-flex-preferred-size:0;flex-basis:0;-ms-flex-positive:1;flex-grow:1;max-width:100%}
      .col-6{-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}
      .h3{font-size:1.75rem}
      .ml-2{margin-left:.5rem!important}
      .mt-3{margin-top:1rem!important}
      .card-footer{padding:.75rem 1.25rem;background-color:rgba(0,0,0,.03);border-top:1px solid rgba(0,0,0,.125)}
      .card-footer:last-child{border-radius:0 0 calc(.25rem - 1px) calc(.25rem - 1px)}
      .text-black-50{color:rgba(0,0,0,.5)!important}
    </style>
</head>
<body>
  <div class="container">

    <div class="card m-5 ">
      <div class="card-header">
        <h1>Follow Notification</h1>
      </div>
      <div class="card-body">
        <div class="row ml-2">
          <div class="col h2">
            Dear, <span class="font-weight-bold">{{ $owner->profile->name }} </span>
          </div>
        </div>
        <div class="row ml-2">
          <div class="col h2">
            <span class="font-weight-bold">{{ $user->profile->name }}</span> Started following you!
          </div>
        </div>
        <div class="row ml-2">
          <a href="http://127.0.0.1:8000/home">Go to page.</a>
        </div>
        <div class="row ml-2 mt-3">
          Thank you for using our application!
        </div>
      </div>
      <div class="card-footer">
        Regards,<br>
        Phoenix
      </div>
    </div>
  </div>
</body>
</html>
