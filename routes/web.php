<?php


use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;


Route::get('/', function (Request $request) {

    //  dd(app());
    echo "home page";
});
Route::get('send-mail', [EmailController::class, 'sendMail']);

// Route::get('/', function (\App\PaymentMethod\PaypalAPI $payment) {
//     dump($payment->Pay());

//     dd(app());
// });

// Route::get('/', function () {

//    Mail::send([],[], function($msg){

//     $msg->to("test@test.com", "advance laravel series")
//          ->subject("Advance laravel series")
//          ->setBody("<p>Hi, this is working fine</p>", 'text/html');

//    });

//    echo "Mail sent";
// });




