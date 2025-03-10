@if ($paymentMethod == 'paypal')
    @include('theme::payment.paypal.form')
@elseif($paymentMethod == 'razorpay')
    @include('theme::payment.razorpay.form')
@elseif($paymentMethod == 'xendit')
    @include('theme::payment.xendix.form')
@elseif($paymentMethod == 'paystack')
    @include('theme::payment.paystack.form')
@elseif($paymentMethod == 'stripe')
    @include('theme::payment.stripe.form')
@elseif($paymentMethod == 'offline')
    @include('theme::payment.offline.form')
@endif
