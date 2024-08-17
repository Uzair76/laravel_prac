<?php

namespace App\Http\Controllers;

use App\Mail\welcomeemail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class EmailController extends Controller
{
    //
    public function sendMail(){
        ini_set('max_execution_time',3600);
        $toEmail = "uzairriaz113@gmail.com";
        $message = "hello , wellcome here to my web app and this is testing email page  ";
        $subject = "WelCome";
        $request = Mail::to($toEmail)->send(new welcomeemail($message, $subject));

        // dd($request);
        echo "Mail Sent";

    }
}
