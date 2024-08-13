<?php

namespace App\PaymentMethod;

class PaypalAPI
{
    private $transaction_id;

    // Corrected constructor method name
    public function __construct($transaction_id)
    {
        $this->transaction_id = $transaction_id;
    }

    public function Pay(): array
    {
        return [
            'amount' => '123',
            'transaction_id' => $this->transaction_id
        ];
    }
}
