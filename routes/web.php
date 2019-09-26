<?php

// Default route for authentifiction based on User model
Auth::routes();

Route::get('send-mail', function () {
	$user = new User();
	$user->email = 'senghok.eang@gmail.com';   // This is the email you want to send to.
	$user->notify(new TemplateEmail());
	$data = [
		'to' => 'to@mail.com'
	];
	auth()->user()->notify(new App\Notifications\TransactionNotification($data));
});

Route::group(['middleware' => 'auth'], function() {
	Route::get('/', function() {
	    if(auth()->user()->role == 'client') {
	    	return redirect()->route('client.pages.dashbaord');
	    }
		return redirect()->route('admin.pages.dashbaord');
	});

	Route::group(['middleware' => 'client', 'prefix' => 'client', 'namespace' => 'Client'], function() {
		Route::resource('transactions', 'TransactionController');
		Route::get('dashbaord', 'PageController@dashbaord')->name('client.pages.dashbaord');
	});

	Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'namespace' => 'Admin'], function() {
		Route::resource('users', 'UserController');
		Route::resource('clients', 'ClientController');
		Route::get('dashbaord', 'PageController@dashbaord')->name('admin.pages.dashbaord');
		Route::get('transactions', 'PageController@transactions')->name('admin.pages.transactions');
	});


	
});


