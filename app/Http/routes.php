<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/','ArticleController@index');
Route::get('articles/{id}','ArticleController@show');
Route::get('article/create','ArticleController@create');
Route::get('test/mysql','TimeController@index');

Route::get('home','InterfaceController@home');                                                                                            
Route::get('server','InterfaceController@server');                                                                                            
Route::get('room','InterfaceController@room');                                                                                            
Route::get('main','InterfaceController@main');
Route::get('port','InterfaceController@port');
Route::get('project/interface','InterfaceController@createTable');

Route::get('produce/inerfacePerformanceData','InterfaceController@produceRandomData');
Route::get('produce/baseConfigData','InterfaceController@produceBaseConfigData');


Route::get('getProgramInfo','InterfaceController@getProgramInfo');
Route::get('getErrorProb','InterfaceController@getErrorProb');
Route::get('getProjectAffairsInfo','InterfaceController@getProjectAffairsInfo');
Route::get('getProjectScore','InterfaceController@getProjectScore');
Route::get('getInterfaceInfo','InterfaceController@getInterfaceInfo');
Route::get('getIFServerInfo','InterfaceController@getIFServerInfo');
Route::get('getIFAffairsInfo','InterfaceController@getIFAffairsInfo');
Route::get('getIFMap','InterfaceController@getIFMap');

Route::get('getMachineRoomInfo','InterfaceController@getMachineRoomInfo');
Route::get('getMRServerInfo','InterfaceController@getMRServerInfo');
Route::get('getMRAffairsInfo','InterfaceController@getMRAffairsInfo');
Route::get('getMRMap','InterfaceController@getMRMap');
Route::get('getServerInfo','InterfaceController@getServerInfo');
Route::get('getServerIFInfo','InterfaceController@getServerIFInfo');
Route::get('getServerAffairsInfo','InterfaceController@getServerAffairsInfo');
Route::get('getServerMap','InterfaceController@getServerMap');


/*
Route::get('/', function () {
     return 'hello world';
    //return view('welcome');

});
Route::get('user/{name?}',function ($name = '漏网之鱼') {
    return 'hello'.' '. $name;
});
 */


