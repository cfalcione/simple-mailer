<?php


/** @var $router \Laravel\Lumen\Routing\Router */

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

$router->post('/contact', function (Request $request) {
    $params = $request->all();
    $validator = \Illuminate\Support\Facades\Validator::make($params, [
        'email' => 'email|required',
        'name' => 'string|required',
        'message' => 'string|required',
    ]);

    if ($validator->fails()) {
        return response()->json(['status' => 'INVALID_PARAMS'], 400);
    }

    Mail::to(config('mail.to_address'))
        ->send(new Contact($params));

    return response()->json(['status' => 'SUCCESS'], 200);
});

$router->get('/ping', function () {
    return response()->json(['msg' => 'pong']);
});
