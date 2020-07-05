@extends('layouts.app')

@section('head-section')
<link rel="stylesheet" href="{{ asset('css/style.bundle.css') }}">
<link rel="stylesheet" href="{{ asset('css/pricing-v1.css') }}">
<link href="{{asset('css/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    
<div class="container">
  <div class="kt-portlet">

    {{-- <div class="kt-portlet">
      <div class="row row-no-padding">
        <div class="col-lg-12 col-xl-4">
          <div class="kt-pricing-v1">
            <div class="kt-pricing-v1__header">
              <div class="kt-iconbox kt-iconbox--no-hover">
                <div class="kt-iconbox__icon">
                  <div class="kt-iconbox__icon-bg"></div>
                  <i class="flaticon-rocket"></i>
                </div>
                <div class="kt-iconbox__title">
                  Daily
                </div>
              </div>
            </div>
            <div class="kt-pricing-v1__body">
              <div class="kt-pricing-v1__labels">
                <div class="kt-pricing-v1__labels-item">1 Domain</div>
                <div class="kt-pricing-v1__labels-item">1 Users</div>
              </div>
              <div class="kt-pricing-v1__content">
                One Day<br>Download any song.
              </div>
              <div class="kt-pricing-v1__price">
                5<span class="kt-pricing-v1__price-currency"><i class="la la-rupee"></i></span>
              </div>
              <div class="kt-pricing-v1__button">
                <button type="button" class="btn btn-brand btn-pill btn-widest btn-taller btn-bold">PURCHASE</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12 col-xl-4">
          <div class="kt-pricing-v1">
            <div class="kt-pricing-v1__header">
              <div class="kt-iconbox">
                <div class="kt-iconbox__icon">
                  <div class="kt-iconbox__icon-bg"></div>
                  <i class="flaticon-customer"></i>
                </div>
                <div class="kt-iconbox__title">
                  Monthly
                </div>
              </div>
            </div>
            <div class="kt-pricing-v1__body">
              <div class="kt-pricing-v1__labels">
                <div class="kt-pricing-v1__labels-item">1 Domain</div>
                <div class="kt-pricing-v1__labels-item">1 Users</div>
              </div>
              <div class="kt-pricing-v1__content">
                One Month<br>Download any song.
              </div>
              <div class="kt-pricing-v1__price">
                59<span class="kt-pricing-v1__price-currency"><i class="la la-rupee"></i></span>
              </div>
              <div class="kt-pricing-v1__button">
                <button type="button" class="btn btn-brand btn-pill btn-widest btn-taller btn-bold">PURCHASE</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12 col-xl-4">
          <div class="kt-pricing-v1 kt-pricing-v1--last">
            <div class="kt-pricing-v1__header">
              <div class="kt-iconbox">
                <div class="kt-iconbox__icon">
                  <div class="kt-iconbox__icon-bg"></div>
                  <i class="flaticon-bus-stop"></i>
                </div>
                <div class="kt-iconbox__title">
                  Yearly
                </div>
              </div>
            </div>
            <div class="kt-pricing-v1__body">
              <div class="kt-pricing-v1__labels">
                <div class="kt-pricing-v1__labels-item">1 Domain</div>
                <div class="kt-pricing-v1__labels-item">1 Users</div>
              </div>
              <div class="kt-pricing-v1__content">
                One Year<br>Download any song.
              </div>
              <div class="kt-pricing-v1__price">
                399<span class="kt-pricing-v1__price-currency"><i class="la la-rupee"></i></span>
              </div>
              <div class="kt-pricing-v1__button">
                <button type="button" class="btn btn-brand btn-pill btn-widest btn-taller btn-bold">PURCHASE</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> --}}

    <div class="kt-portlet__head">
      <div class="kt-portlet__head-label">
        <h3 class="kt-portlet__head-title">Secure Payment</h3>
      </div>
    </div>

    <div class="kt-form">
      <div class="kt-portlet__body">
        <div class="form-group row form-group-marginless">
          <div class="col">
            <div class="row">
              <div class="col-lg-4">
                <label class="kt-option">
                <span class="kt-option__control">
                <span class="kt-radio kt-radio--bold kt-radio--brand kt-radio--check-bold" checked="">
                <input type="radio" name="plan" value="Day" checked>
                <span></span>
                </span>
                </span>
                <span class="kt-option__label">
                <span class="kt-option__head">
                <span class="kt-option__title">
                Daily plan				
                </span>
                <span class="kt-option__focus">
                <i class="la la-rupee"></i> 5.00					
                </span>												 
                </span>
                <span class="kt-option__body">
                You can download any song for a Day.
                </span>
                </span>		
                </label> 
              </div>
              <div class="col-lg-4">
                <label class="kt-option">
                <span class="kt-option__control">
                <span class="kt-radio kt-radio--bold kt-radio--brand">
                <input type="radio" name="plan" value="Month">
                <span></span>
                </span>
                </span>
                <span class="kt-option__label">
                <span class="kt-option__head">
                <span class="kt-option__title">
                Monthly Plan
                </span>
                <span class="kt-option__focus">
                <i class="la la-rupee"></i> 49.00					
                </span>												 
                </span>
                <span class="kt-option__body">
                You can download any song for a Month.
                </span>
                </span>		
                </label> 
              </div>
              <div class="col-lg-4">
                <label class="kt-option">
                <span class="kt-option__control">
                <span class="kt-radio kt-radio--bold kt-radio--brand">
                <input type="radio" name="plan" value="Year">
                <span></span>
                </span>
                </span>
                <span class="kt-option__label">
                <span class="kt-option__head">
                <span class="kt-option__title">
                Yearly Plan				
                </span>
                <span class="kt-option__focus">
                <i class="la la-rupee"></i> 399.00					
                </span>												 
                </span>
                <span class="kt-option__body">
                  You can download any song for a Year.
                </span>
                </span>		
                </label> 
              </div>
            </div>
          </div>
        </div>    
        <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
        <div class="form-group row form-group-marginless ml-5 mr-5 mb-2">
          <label class="col-lg-2 col-form-label">Full Name:</label>
          <div class="col-lg-10">
            <input id="card-holder-name" class="form-control" type="text">
          </div>
        </div>
        <div class="form-group row form-group-marginless ml-5 mr-5 mt-2">
          <div class="col">
            <!-- Stripe Elements Placeholder -->
            <div id="card-element" class="border"></div>  
          </div>
        </div>
      </div>
      <div class="kt-portlet__foot">
        <div class="kt-form__actions">
          <button id="card-button" class="btn btn-success rounded-pill btn-block" data-secret="{{ $intent->client_secret }}">
            Secure Pay
          </button> 	 						 
        </div>
      </div>
    </div>

    <form action="/primium/payment" method="POST" id="paymentForm">
      @csrf
      <input type="hidden" id="payment_method" name="payment_method">
      <input type="hidden" id="plan" name="plan_name" value="Day">
    </form>
  
  </div>
</div>

@endsection


@section('script')

<script src="https://js.stripe.com/v3/"></script>
<script>
    window.addEventListener('load', function () {
        
        const stripe = Stripe(' {{ env('STRIPE_KEY') }} ');

        const elements = stripe.elements();
        const cardElement = elements.create('card');

        cardElement.mount('#card-element');
        
        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;

        cardButton.addEventListener('click', async (e) => {
            const { setupIntent, error } = await stripe.confirmCardSetup(
                clientSecret, {
                    payment_method: {
                        card: cardElement,
                        billing_details: { name: cardHolderName.value }
                    }
                }
            );

            if (error) {
                // Display "error.message" to the user...
                console.log(error);
            } else {
                // The card has been verified successfully...
                console.log('success', setupIntent.payment_method);


                // axios.post('/subscription', {
                //     payment_method: setupIntent.payment_method,
                //     // plan:
                //   });


                $('#payment_method').val(setupIntent.payment_method);
                $('#paymentForm').submit();

            }
        });


    });
</script>

  <script>
    // alert($('plan').val());
    $(document).on('click', 'input[type=radio]', function() {
      $('#plan').val($(this).val());
    })
  </script>
@endsection