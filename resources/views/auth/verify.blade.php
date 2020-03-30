@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center text-dark">
        <div class="col-md-8 text-white">

            <div class="card bg-dark">
                <div class="row card-header">
                    <div class="col">
                        <div class=" display-4">
                            Looking to Verify an Email?
                        </div>
                    </div>
                </div>
    
                <div class="row card-body">
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                @if (session('resent'))
                                    <div class="alert alert-success" role="alert">
                                        {{ __('A fresh verification link has been sent to your email address.') }}
                                    </div>
                                @endif
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        {{ __('Before proceeding, please check your email for a verification link.') }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        {{ __('If you did not receive the email') }},
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="row card-footer">
                    <div class="col">
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>
                        </form>                                    
                    </div>
                </div>
            </div>

            

        </div>
    </div>
</div>
@endsection
