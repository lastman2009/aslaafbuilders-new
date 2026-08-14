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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');
Route::get('/test','LocationController@addCity');
Route::get('/property','PropertyController@getPropertyApi');

// DHA / property transfer cost calculator — Phase to Block dropdown lookup only.
// The calculation itself runs server-side (see PropertyTransferCalculatorController),
// not through this API, per explicit requirement.
Route::get('/societies/{society}/blocks', '\App\Http\Controllers\Api\PropertyTaxCalculatorController@blocksForSociety');
Route::post('/signup','AuthenticationController@register');
Route::post('/propertyDetail','PropertyController@getPropertyDetailAPI');
Route::post('/login','AuthenticationController@login');
Route::post('/searchPropertyData','PropertyController@searchPropertyData');
Route::post('/getCity','LocationController@getCitycomplete');
Route::get('/getCityName/{id}','LocationController@getCityName');
Route::get('/getTownName/{id}','LocationController@getTownName');
Route::get('/getBlockName/{id}','LocationController@getBlockName');
Route::get('/getPhaseName/{id}','LocationController@getPhaseName');
Route::post('/getCityId','LocationController@getCityId');
Route::post('/getTownId','LocationController@getTownId');
Route::get('/getPropertyTypes','PropertyTypeController@getPropertyTypesAPI');
Route::post('/getAllPhaseAccordingToTown','LocationController@getAllPhaseAccordingToTown');
Route::post('/getAllBlockAccordingToPhase','LocationController@getAllBlockAccordingToPhase');
Route::post('/addFrequentPropertyAPI','PropertyController@addFrequentPropertyAPI');
Route::post('/allLatestProperties','PropertyController@allLatestProperties');
Route::post('/plotsApi','PropertyController@plotsApi');
Route::post('/allBuy','PropertyController@allBuy');
Route::post('/allRent','PropertyController@allRent');
Route::post('/allProject','PropertyController@allProject');
Route::post('/allWanted','PropertyController@allWanted');
Route::post('/findOrCreateUserApi','AuthenticationController@findOrCreateUserApi');                           
Route::post('/savePropertyMobileAPI','PropertyController@savePropertyMobileAPI');
Route::post('/userSavedProperties','PropertyController@userSavedProperties');
Route::post('/contactDetaiLAPI','HomeController@contactDetaiLAPI');
Route::post('/password-reset','AuthenticationController@passwordReset');
Route::post('/update_password','AuthenticationController@update_password');
Route::post('/my_properties','PropertyController@my_properties');
Route::post('/deleteProperty','PropertyController@deletePropertyMobileApi');
Route::post('/unsaveProperty','PropertyController@unsavePropertyMobileApi');
Route::post('/ApiEditProperty','PropertyController@ApiEditProperty');
Route::post('/EditFrequentPropertyAPI','PropertyController@EditFrequentPropertyAPI');
Route::post('/DeleteFrequentPropertyImageAPI','PropertyController@ApiDeletePropertyImage');
Route::post('/ApiGetAgents', 'AgencyWebsiteController@ApiGetAgents');
Route::post('/ApiGetSingleAgents', 'AgencyWebsiteController@ApiGetSingleAgents');
Route::post('/agentWebsiteUrl','AgencyWebsiteController@agentWebsiteUrl');
Route::post('/getPropertyTypeChildData','PropertyTypeController@getPropertyTypeChildData');
