<?php
Route::get('/',function(){
	return View::make('hello');
});
/**
 * =================================================================================
 * LOGIN & SIGNUP PAGES & PROCESS
 * Confide Routes
 */
Route::get('/sign_up', 'UsersController@createSignUp');
Route::post('/sign_up', 'UsersController@doSignUp');
Route::get('/login', 'UsersController@createLogin');
Route::post('/login', 'UsersController@doLogin');
Route::get('/confirm/{code}', 'UsersController@confirm');
Route::get('/forgot_pwd', 'UsersController@forgotPassword');
Route::post('/forgot_pwd', 'UsersController@doForgotPassword');
Route::get('/reset_pwd/{token}', 'UsersController@resetPassword');
Route::post('/reset_pwd', 'UsersController@doResetPassword');
Route::get('/logout', 'UsersController@logout');
/**
*THE ROUTE GROUP TO ENFORCE AUTHENTICATION
*
*/
Route::group(array('before'=>'auth'),function(){
	/**
*
*
*/
Route::get('home/dashboard','HomeController@splashScreen');
Route::get('/new_assetcategory','HomeController@showCategory');
Route::post('/new_assetcategory','HomeController@createCategory');

/**
*THE ASSETS ROUTES
*
*/
Route::get('/new_asset','AssetController@recordAsset');
Route::post('/new_asset','AssetController@createAsset');
Route::get('/view_asset','AssetController@viewAsset');
Route::get('/view_asset/delete/{id}','AssetController@trashAsset');
Route::post('asset/view_asset','AssetController@editAsset');
Route::post('asset/view_asset/update','AssetController@updateAsset');
/**
*THE BOOKINGS ROUTES
*
*/
Route::get('/new_checkin','BookingController@recordCheckin');
Route::post('/new_checkin','BookingController@createCheckin');
Route::get('/view_checkin/delete/{id}','BookingController@trashCheckin');
Route::post('checkin/view_checkin','BookingController@editCheckin');
Route::get('/view_checkin','BookingController@viewCheckin');
Route::post('checkin/view_checkin/update','BookingController@updateCheckin');
/**
*THE EVENTS ROUTES
*
*/
Route::get('/new_event','EventController@recordEvent');
Route::post('/new_event','EventController@createEvent');
Route::get('/view_event','EventController@viewEvent');
Route::get('/view_event/delete/{id}','EventController@trashEvent');
Route::post('event/view_event','EventController@editEvent');
Route::post('event/view_event/update','EventController@updateEvent');
Route::get('/view_event/manage/{id}','EventController@manageEvent');
Route::post('view_event/manage/manage_event','EventController@pickEventItem');
/**
*THE CHECKOUTS ROUTES
*
*/
Route::get('/new_checkout','CheckoutController@recordCheckout');
Route::post('/new_checkout','CheckoutController@createCheckout');
Route::get('/view_checkout/delete/{id}','CheckoutController@trashCheckout');
Route::get('/view_checkout','CheckoutController@viewCheckout');
Route::post('checkout/view_checkout','CheckoutController@editCheckout');
Route::post('checkout/view_checkout/update','CheckoutController@updateCheckout');
/**
*THE MAINTENANCE ROUTES
*
*/
Route::get('/new_maintenance','MaintenanceController@recordMaintenance');
Route::post('/new_maintenance','MaintenanceController@createMaintenance');
Route::get('/view_maintenance','MaintenanceController@viewMaintenance');
Route::get('/view_maintenance/delete/{id}','MaintenanceController@trashMaintenance');
Route::post('maintenance/view_maintenance','MaintenanceController@editMaintenance');
Route::post('maintenance/view_maintenance/update','MaintenanceController@updateMaintenance');
/**
*THE REPORTS ROUTE
*
*/
Route::get('/assets_report','ReportsController@curtainReport');
Route::get('/bookings_report','ReportsController@bookingReport');
Route::post('/bookings_report','ReportsController@viewBookingReport');
Route::get('/checkouts_report','ReportsController@checkoutReport');
Route::post('/checkouts_report','ReportsController@viewCheckoutReport');
Route::get('/events_report','ReportsController@eventReport');
Route::post('/events_report','ReportsController@viewEventReport');
Route::get('/maintenances_report','ReportsController@maintenanceReport');
Route::post('/maintenances_report','ReportsController@viewMaintenanceReport');
/**
*THE SEARCH ROUTE
*
*/
Route::post('/search','SearchController@performSearch');

Route::resource('locations', 'LocationsController');

/**
 * Quotation Controller
 */
Route::controller('/orders/quotation', 'OrdersController');

});