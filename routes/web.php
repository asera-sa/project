<?php

use Illuminate\Http\Request;

    route::group(['prefix' => 'admin','middleware' => 'auth'],function()
    {

        Route::get('read-notify', function ()
        {
            auth()->user()->unreadNotifications->markAsRead();
            return back();
        });

        Route::post('save-fcmtoken', function (Request $request)
        {
            auth()->user()->update([
                'fcm_token' => $request->fcm_token
            ]);
            return response()->json([
                'status' => 'success', 
                'message' => 'fcm token is updated for user',
                'fcm_token' => $request->fcm_token
            ]);
        });

        Route::resource('/User', 'UserController');
        Route::resource('/employees', 'employeesController');
        Route::resource('/halls', 'HallsController');   
        Route::get('halls/{id}/close','HallsController@close');
        Route::get('halls/{id}/open','HallsController@open');
     
       
        Route::resource('/customer', 'customerController');
        Route::resource('/reservation', 'reservationController');
        // Route::get('/refresh','reservationController@refresh');

        

        Route::get('/hallServies', 'HallsDataController@indexS');//صقحة خدمات صالة
        Route::post('/hallServies', 'HallsDataController@storeS');
        Route::delete('/hallServies/{id}', 'HallsDataController@destroyS');
        Route::get('/hallOccasions', 'HallsDataController@indexO');//صفحة مناسبات الصالة
        Route::post('/hallOccasions', 'HallsDataController@storeO');
        Route::delete('/hallOccasions/{id}', 'HallsDataController@destroyO');


        Route::get('/news', 'newsController@index');
        Route::post('/news', 'newsController@store');
        Route::delete('/news/{id}', 'newsController@destroy');
        Route::get('/news/{id}', 'newsController@show');
        Route::get('/pic', 'newsController@pic');
        Route::post('/pic', 'newsController@insertpic');
        Route::delete('/pic/{id}', 'newsController@delpic');


        Route::get('/bills/', 'billsController@index');
        Route::post('/bills', 'billsController@store');
        Route::get('/bills/create/{id}', 'billsController@create');
        Route::delete('/bills/{id}', 'billsController@delete');


        Route::get('/report', 'reportController@index');
        Route::get('/report/allEmp', 'reportController@allEmp');
        Route::get('/report/allEmp_jobs', 'reportController@allEmp_jobs');
        Route::get('/report/allEmp_salary', 'reportController@allEmp_salary');
        Route::get('/report/bills_id', 'reportController@bills_id');


        Route::get('/messages', 'messageController@index');
        Route::get('/messages/{id}/show', 'messageController@show');
        Route::get('/messages/{id}', 'messageController@replay');
        Route::post('messages/{id}/replay', 'messageController@replayMessage');
        Route::delete('/messages/{id}', 'messageController@delete');


        Route::get('/homeAdmin', 'HomeController@homeAdmin');
        Route::get('/search', 'HomeController@search');

        /*-----------------Setting----------------------------*/

        Route::get('/setting','SettingController@index');
        Route::post('/addServices','SettingController@addServices');
        Route::delete('/delServices/{id}','SettingController@delservices');
        Route::post('/addJobs','SettingController@addJobs');
        Route::delete('/deljobs/{id}','SettingController@deljobs');
        Route::get('/addAddress','SettingController@addAddress');
        Route::delete('/delAddress/{id}','SettingController@delAddress');

        Route::get('/home','HomeController@index')->name('home');
        Route::get('/','HomeController@index')->name('home');
        
    });

    Auth::routes(); 
   
    Route::get('/','pagewebController@index');   
    Route::get('/about','pagewebController@about');

    Route::get('/contact','pagewebController@contact');
    Route::post('/contact','pagewebController@send');
    
    Route::get('/halls','pagewebController@halls');
    Route::post('/halls','pagewebController@search');
    Route::get('/halls/sort','pagewebController@sort');
    
    Route::get('/halls/{id}','pagewebController@showhalls');
    Route::get('/reservation/create/{id}','pagewebController@createRes');
    Route::post('/reservation/create/{id}','pagewebController@insertRes');
    Route::get('/customer','pagewebController@insertcustomer');
    
    Route::get('/createhalls','pagewebController@createhalls');
    Route::post('/createhalls','pagewebController@inserthalls');
    
    Route::get('/canelReservation','pagewebController@cancelres');
    Route::post('/canelReservation','pagewebController@delres');
   
    Route::get('/rr', function(){
        return view('leaflet');
    });
    

// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/','HomeController@index')->name('home');


