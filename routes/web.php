<?php



// User
Route::get('/', function(){
    return redirect('/contacts');
});

Route::get('/login', 'SessionController@index')->name('login');
Route::post('/login', 'SessionController@store')->name('login.store');
Route::get('/signup', 'RegistrationController@index');
Route::post('/signup', 'RegistrationController@store')->name('signup.store');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout','SessionController@logout')->name('logout');
    Route::get('/contacts', 'Contacts@index');

    Route::get('/profile', 'Profile@index');
    Route::post('/update-profile', 'Profile@update')->name('profile.update');

    Route::get('/new-contact', function(){
        return view('pages.new-contact');
    });

    Route::post('/new-contact', 'Contacts@store')->name('contact.store');
    Route::post('/update-contact', 'Contacts@update')->name('contact.update');
    Route::get('/delete-contact', 'Contacts@destroy');
    Route::get('/edit-contact/{id}', 'Contacts@edit');
});




