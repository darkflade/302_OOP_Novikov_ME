<?php

namespace App;

class PayPalAdapter implements PaymentAdapterInterface
{
    private PayPal $paypal;

    public function __construct(PayPal $paypal)
    {
        $this->paypal = $paypal;
    }

    public function collectMoney($amount): bool
    {
        $result = $this->paypal->transfer('', $amount);
        return (trim(strtolower($result)) === 'paypal success!');
    }
}
