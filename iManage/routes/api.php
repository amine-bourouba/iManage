<?php

Route::group([

    'middleware' => 'guest',

], function(){

    Route::post('/enterprise', 'EnterpriseController@register');
    Route::post('/member', 'MemberController@register');

});


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');


    Route::post('/document', 'DocumentController@insert'); 
    Route::post('/machine', 'MachineController@insert'); 
    Route::post('/notification', 'NotificationController@insert');
    Route::post('/feedbacktraining', 'TrainingController@feedback');
    Route::post('/feedbackmachine', 'MachineController@feedback');
    Route::post('/feedbackstorage', 'StorageController@feedback');
    Route::post('/feedbackapplication', 'ApplicationController@feedback');

    Route::put('/document/{id}', 'DocumentControlle@update');
    
    Route::get('/enterprise/{id?}', 'EnterpriseController@get');
    Route::get('/employee/{id?}', 'EmployeeController@get');
    Route::get('/member/{id?}', 'MemberController@get');
    Route::get('/document/{id}', 'DocumentController@get');
    Route::get('/machine/{id}', 'MachinetController@get');
    Route::get('/application/{id}', 'ApplicationController@get');
    Route::get('/storage/{id}', 'StorageController@get');
    Route::get('/training/{id}', 'TrainingController@get');
    Route::get('/notification/{id}', 'NotificationController@get');


    Route::group([

        'middleware' => 'enterprise',

     ], function () {

        Route::post('/employee', 'EmployeeController@register');   
        Route::post('/application', 'ApplicationController@insert');
        Route::post('/storage', 'StorageController@insert');
        Route::post('/training', 'TrainingController@insert');
        Route::post('/task', 'TaskController@insert');
        Route::post('/finance', 'FinanceController@insert');
        Route::post('/dutytime', 'DutytimeController@insert'); 
        Route::post('/topology', 'TopologyController@insert');
        Route::post('/enterprisefeedbacktask', 'TaskController@feedback');

        Route::put('/enterprise', 'EnterpriseController@update');
        Route::put('/employee/{id}', 'EmployeeController@update');
        Route::put('/machine/{id}', 'MachineController@update');
        Route::put('/application/{id}', 'ApplicationController@update'); 
        Route::put('/storage/{id}', 'StorageController@update');
        Route::put('/training/{id}', 'TrainingController@update');
        Route::put('/task/{id}', 'TaskController@update');
        Route::put('/dutytime/{id}', 'DutytimeController@update'); 
        
        Route::get('/task/{id}', 'TaskController@get'); 
        Route::get('/finance/{id}','FinanceController@get');
        Route::get('/topology/{id}','TopologyController@get');
        Route::get('/complaint/{id}', 'ComplaintController@get');  

        Route::delete('/enterprise','EnterpriseController@destroy');
        Route::delete('/employee/{id}','EmployeeController@destroy');
         
    });
    

    Route::group([
    
        'middleware' => 'employee'
     
     ], function () {
          
        Route::post('/application', 'ApplicationController@insert');
        Route::post('/storage', 'StorageController@insert');
        Route::post('/feedbacktask', 'TaskController@feedback');
    
        Route::put('/machine/{id}', 'MachineControlle@update');
        Route::put('/application/{id}', 'ApplicationController@update'); 
        Route::put('/storage/{id}', 'StorageController@update');
        Route::put('/training/{id}', 'TrainingController@update');
        Route::put('/task/{id}', 'TaskController@update');
        Route::put('/dutytime/{id}', 'DutytimeController@update'); 

        Route::get('/task/{id}', 'TaskController@get');  
        Route::get('/complaint/{id}', 'ComplaintController@get');
        Route::get('/dutytime/{id}', 'DutytimeController@get');
        Route::get('/topology/{id}','TopologyController@get');
    
     });


     Route::group([
    
        'middleware' => 'member',
     
     ], function () {
           
        Route::post('/complaint', 'ComplaintController@insert');
        Route::post('/evaluateemployee', 'MemberController@evaluateEmployee');
        Route::post('/evaluateenterprise', 'MemberController@evaluateEnterprise');
    
        Route::put('/member/', 'MemberController@update');
        
        Route::delete('/member/','MemberController@destroy');
        
     });
    
});

