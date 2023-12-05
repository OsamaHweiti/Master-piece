<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <base href="{{ url('/') }}">
    <link href="{{ asset('css/checkout.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />
    {{-- font awosom --}}
  <link rel="stylesheet" data-purpose="Layout StyleSheet" title="Web Awesome"
  href="/css/app-wa-9a55d8748fd46de7b7977d9ee8dee7a4.css?vsn=d">

<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/all.css">

<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-solid.css">

<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-regular.css">

<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-light.css">
    <title>Checkout</title>
</head>

<body>
    
    @include('homepage/includes/navbar')
    <section class="content">

        <div class="container">

        </div>
        <div class="details shadow">
            <div class="details__item">

                <div class="item__image">
                    <img class="iphone" src="{{ asset('images/logo-removebg-preview.png') }}" alt=""  style="
  border-radius: 8px 0 0 8px;">
                </div>
                <div class="item__details">
                    <div class="item__title">
                        {{ $price->name }}
                    </div>
                    <div class="item__price">
                        {{ $price->price }} $
                    </div>
                    <div class="item__quantity">
                        Duraction : 30Days
                    </div>
                    <div class="item__description">
                        <ul style="">
                            <li>{{ $price->ram }}</li>
                            <li>{{ $price->storage }}/li>
                            <li>DDoS Protection</li>
                            <li>Full Root Access</li>
                            <li>24/7/365 Tech Support</li>
                        </ul>

                    </div>

                </div>
            </div>

        </div>
        <div class="discount"></div>
        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
        <div class="container">
            <div class="payment">
                <div class="payment__title">
                    Payment Method
                </div>
                <div class="payment__types">
                    <div class="payment__type payment__type--cc active">
                        <i class="icon icon-credit-card"></i>Credit Card
                    </div>
                    <div class="payment__type payment__type--paypal">
                        <i class="icon icon-paypal"></i>Paypal
                    </div>
                    <div class="payment__type payment__type--paypal">
                        <i class="icon icon-wallet"></i>SEPA
                    </div>
                    <div class="payment__type payment__type--paypal">
                        <i class="icon icon-note"></i>Invoice
                    </div>
                </div>

                <div class="payment__info">
                    <div class="payment__cc">
                        <div class="payment__title">
                            <i class="icon icon-user"></i>Payment Information
                        </div>
                        <form id="payment-form" action="{{route('payment')}}" method="POST" style="height: 100px">
                            @csrf
                            <!-- Payment amount -->
                            <div class="d-flex">
                                <input type="hidden" name="price_id" id="amount"  value="{{ $price->id }}" required class="amount">
                                <input type="hidden" name="price" id="amount"  value="{{ $price->price }}" required class="amount">
                            </div>


                            <!-- Card Element -->
                            <div id="card-element" class="cardE" style="height:50px"></div>

                            <!-- Display errors -->
                            <div id="card-errors" role="alert" class="cardE  alert-danger text-center mb-2"></div>

                            <!-- Submit button -->
                            <button type="button" id="submit-payment" class="subPay  btn action__submit">Submit Payment</button>
                          </form>
                    </div>
                    <div class="payment__shipping">
                        <div class="payment__title">
                            <i class="icon icon-plane"></i> Personal Information
                        </div>
                        <div class="details__user">
                            <div class="user__name">
                                Name: {{ Auth::user()->username }}
                                <br>
                                Mobile number: {{ Auth::user()->phone }}
                                <br>
                                Email: {{ Auth::user()->email }}
                            </div>
                            <div class="user__address">
                                Country: Jordan</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="actions">
                
                <a href="/" class="backBtn">Go Back to Home</a>
            </div>
    </section>
    </div>
    @include('homepage/includes/footer')
</body>
<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('pk_test_51OJwGjCuw1NUH63aFMVKmcnPyN7Es9QQfZGUt6FVk0Q8pDD6vLAiqgrEU4dATrOjX0pFx5q9RzaJouzKR2MrXRuM00KralDztv');
    const elements = stripe.elements();
  
    const card = elements.create('card');
  
    card.mount('#card-element');
  
    card.addEventListener('change', function(event) {
        const displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });
  
    document.getElementById('submit-payment').addEventListener('click', async function() {
    const { paymentMethod, error } = await stripe.createPaymentMethod({
        type: 'card',
        card: card,
    });

    if (error) {
        const displayError = document.getElementById('card-errors');
        displayError.textContent = error.message;
    } else {
        const form = document.getElementById('payment-form');
        const hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'payment_method_id');
        hiddenInput.setAttribute('value', paymentMethod.id);
        form.appendChild(hiddenInput);

        form.submit();
    }
});

  </script>

</html>
