<?php

use App\Events\ChatEvent;
use App\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//dd(app()->make('Hello'));
// $hello = resolve(Hello::class);
// dd($hello);

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('chat', 'ChatController@chat')->middleware('auth');
Route::post('send', 'ChatController@send')->middleware('auth');
Route::get('user', 'ChatController@findUser');

Route::get('/', 'Controller@handle');

Route::get('event', function ()
{	
	$user = User::find(Auth::id());
	event(new ChatEvent('this is ', $user));
	
	return "Event has been sent!";
})->middleware('auth');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/broadcast', function() {
    
    // New Pusher instance with our config data
    $pusher = new Pusher\Pusher(
        config('broadcasting.connections.pusher.key'),
        config('broadcasting.connections.pusher.secret'),
        config('broadcasting.connections.pusher.app_id'),
        config('broadcasting.connections.pusher.options')
    );
        
    // Enable pusher logging - I used an anonymous class and the Monolog
    $pusher->set_logger(new class {
           public function log($msg)
           {
                 \Log::info($msg);
           }
    });
        
    // Your data that you would like to send to Pusher
    $data = ['text' => 'hello world from Laravel 5.3'];
        
    // Sending the data to channel: "test_channel" with "my_event" event
    $pusher->trigger( 'test_channel', 'my_event', $data);
        
    return 'ok'; 
});