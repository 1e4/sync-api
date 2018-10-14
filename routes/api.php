<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix'    =>  'room'
], function() {
    Route::get('/', 'RoomController@getAllPublicRooms');
    Route::get('{room}', 'RoomController@getRoom');
    Route::post('{room}', 'RoomController@createRoom');
    Route::delete('{room}', 'RoomController@deleteRoom');

    Route::get('{room}/messages', 'RoomMessageController@getMessages');
    Route::post('{room}/message', 'RoomMessage@createMessage');
    Route::delete('{room}/{message}', 'RoomMessage@deleteMessage');
});

