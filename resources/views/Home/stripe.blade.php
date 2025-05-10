<!DOCTYPE html>
<html>
<head>
    <title>Online Bookstore Payment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <style>
        body {
            background-image: url('../images/p1.jpg');
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @keyframes borderAnimation {
            0% { border-color: #0386d1; }
            25% { border-color: #ff5733; }
            50% { border-color: #33ff57; }
            75% { border-color: #ff33a6; }
            100% { border-color: #0386d1; }
        }

        .payment-container {
            background-color: rgba(213, 210, 210, 0.83);
            padding: 45px;
            border-radius: 15px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.8s ease-in-out;
            width: 100%;
            max-width: 500px;
            border: 3px solid;
            animation: borderAnimation 3s infinite linear;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        #pay-btn {
            background: #ff758c;
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-size: 16px;
            color: white;
            width: 100%;
            cursor: pointer;
            transition: 0.3s ease;
        }

        #pay-btn:hover {
            background: #ff5864;
            transform: scale(1.05);
        }

        .back-btn {
            display: inline-block;
            position: absolute;
            top: 20px;
            left: 20px;
            margin: 15px;
            padding: 8px 15px;
            font-size: 20px;
            background: #f80e0e;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            transition: all 0.3s ease-in-out;
        }

        .back-btn:hover {
            background: #09e639;
            transform: translateY(-2px);
            box-shadow: 0 3px 8px rgba(104, 255, 3, 0.2);
        }
    </style>
</head>
<body>

<a href="/mycart" class="btn btn-secondary back-btn">← Back</a>

<div class="payment-container text-center">
    <h2 class="mb-3">Online Book Store Payment</h2>

    <h4>Total Value of Cart: ৳ {{ $value }}</h4>

    @if (Session::has('success'))
        <div class="alert alert-success text-center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <p>{{ Session::get('success') }}</p>
        </div>
    @endif

    <form id="checkout-form" method="post" action="{{ route('stripe.post', $value) }}">
        @csrf
        <input type="hidden" name="stripeToken" id="stripe-token-id">
        <div id="card-element" class="form-control mb-3"></div>
        <button type="button" id="pay-btn">Pay Now</button>
    </form>
</div>

<script>
    var stripe = Stripe('{{ env('STRIPE_KEY') }}');
    var elements = stripe.elements();
    var cardElement = elements.create('card');
    cardElement.mount('#card-element');

    document.getElementById('pay-btn').addEventListener('click', function () {
        stripe.createToken(cardElement).then(function(result) {
            if (result.error) {
                alert(result.error.message);
            } else {
                document.getElementById('stripe-token-id').value = result.token.id;
                document.getElementById('checkout-form').submit();
            }
        });
    });
</script>

</body>
</html>
