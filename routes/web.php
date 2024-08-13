<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


// Route::get('/', function (Request $request) {

//     dd(app());
// });

Route::get('/', function (\App\PaymentMethod\PaypalAPI $payment) {
    dump($payment->Pay());

    dd(app());
});

