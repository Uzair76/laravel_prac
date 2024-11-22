<?php


use App\Http\Controllers\EmailController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;


Route::get('/', function (Request $request) {

    //  dd(app());
    echo "home page";
});
Route::get('send-mail', [EmailController::class, 'sendMail']);


//

Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/users/{id}/assign-houses', [UserController::class, 'assignHouses'])->name('user.assign-houses');
Route::post('/users/{id}/assign-houses', [UserController::class, 'storeAssignedHouses'])->name('user.store-assigned-houses');

Route::get('users/create', [UserController::class, 'create'])->name('users.create');

Route::get('users/{user}/images/create', [ImageController::class, 'create'])->name('users.images.create');
Route::post('users/{user}/images', [ImageController::class, 'store'])->name('users.images.store');
Route::post('users', [UserController::class, 'store'])->name('users.store');

Route::get('houses', [HouseController::class, 'index'])->name('houses.index');
Route::get('houses/create', [HouseController::class, 'create'])->name('houses.create');
Route::post('houses', [HouseController::class, 'store'])->name('houses.store');
Route::get('houses/{id}/edit', [HouseController::class, 'edit'])->name('house.edit');
Route::delete('houses/{id}', [HouseController::class, 'delete'])->name('house.delete');
Route::put('houses/{id}', [HouseController::class, 'update'])->name('house.update');



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




