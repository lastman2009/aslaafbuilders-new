<?php

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
//Route::get('/update_password_all','DashboardController@update_password_all');
 //Route::get('/count_property','DashboardController@count_property');
 Route::get('/up', function() {
    \Artisan::call('up');

    return "up";
});
 Route::get('/down', function() {
    \Artisan::call('down');

    return "down";
});
Route::get('/searchdata_me','HomeController@searchdata_me');
Route::get('/upload_image','DashboardController@upload_view');
Route::post('/upload_image_now','DashboardController@upload_image_now');
Route::get('/homePage','IndexController@homePage');
Route::get('/townCount','IndexController@townCount');
Route::get('/phaseCount','IndexController@phaseCount');
Route::get('/blockCount','IndexController@blockCount');
Route::get('/featuredAgencies','PropertyController@featuredAgencies');
// Route::get('/lastestListing','HomeController@latestListing');


Route::get('/YMrpFkU6QLPNL2uEbVk5MmVdoYSQ3SDQXymCFkmSPW4gWBev13oWGqJpqhli', function () {
    return view('auth.dataEntryRegister');
});
Route::any('/create','PropertyController@create_view_property_list');
Route::post('/dataEntrySignup','AuthenticationController@dataEntrySignup');

/////For Password Routes //////
// Route::get('/update_all_url','PropertyController@updateUrl');
Route::get('/updateMarla','PropertyController@updateMarla');
Route::get('/images_resize','PropertyController@images_resize');

Route::post('/update_password','AuthenticationController@update_password');
Route::get('/reset_password/{email}/{token}','AuthenticationController@reset_password');
Route::post('/password-reset','AuthenticationController@passwordReset');
Route::post('/tell_friend','HomeController@tell_friend');

//////////////////
Route::get('/addbanner','AgencyWebsiteController@addbanner');
Route::get('/favorite','HomeController@favorite');

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/site-map', function () {
    return view('pages.sitemap');
});
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
     return '<h1>Clear cache cleared</h1>';
});
Route::get('/clear-view', function() {
    $exitCode = Artisan::call('view:clear');
     return '<h1> View cleared</h1>';
});

Route::get('/session','HomeController@session');
Route::any('/sendPropertyDataToSupport','HomeController@sendPropertyDataToSupport');
Route::get('/google',function(){
    return view('google');
});
Route::get('/signup-agent','HomeController@agent_signup');
Route::post('/agenct_signup' ,'AuthenticationController@singAgent');
// Route::get('/cache-clear',function(){
//   Artisan::call('config:cache'); 
//   return "hello";
    
// });
Route::get('/auth/login',function(){

    return redirect('/login');
});
Route::get('refresh-csrf', function(){
    return csrf_token();
});


Route::get('/','HomeController@landingPage')->name('home');
Route::get('new', function () {
    return view('frontwebsite.property.property-detail-page');
});
Route::get('/about-us', 'AboutController@index');

Route::get('/contact-us','HomeController@contactus');
Route::post('/contactus','HomeController@contactdetail');
Route::get('/page-not-found',function(){
    return view('frontwebsite.errorPages.error404');
});
Route::get('/forbidden',function(){
    return view('frontwebsite.errorPages.error403');
});
Route::get('/internal-server-error',function(){
    return view('frontwebsite.errorPages.error500');
}); 
Route::get('/activate/user',function(){
    return view('frontwebsite.activationPage.activation');
});
Route::post('/activation','AuthenticationController@mobieActivation');
Route::get('/activate/{code}','AuthenticationController@SmsActivation');
// Route::get('/property/{type}/{city}/{town}/{title}/{id}','PropertyController@test');
Route::get('/property/{type}/{city}/{town}/{title}/{id}','PropertyController@test1');
Route::get('/project/{city}/{town}/{title}/{id}','ProjectController@projectDisplayPage');
Auth::routes();


Route::get('/agencies-search','AgencyWebsiteController@agenciesSearch');
Route::get('/blog-search','BlogController@blogSearch');


// Route::any('/emailForm','HomeController@emailform');

Route::any('/emailForm','HomeController@emailform');
// /.//////////////////// BLOG ROUTES.............///////
Route::any('/blog/{id}/{title}','BlogController@view');
Route::any('/blog','BlogController@blogListing');
Route::any('/news','BlogController@newsListing');

Route::get('/blogslist/{year}/{month}','BlogController@blogListingYearMonth');
Route::get('/blog-{category}/{id}','BlogController@blogListingByCategory');
///Graph data load ajax call
Route::post('/graphdata','FileController@graphdata');

/////Search home ajax calls ///
Route::post('/search_home','HomeController@search_home_ajax');
// ............/////////////////BLOGS End//////........................./////////
Route::get('/home','DashboardController@dashboard');
Route::get('/selfdata', 'HomeController@index');
// Route::get('/home', 'HomeController@index');
Route::post('/getLocation','HomeController@testfunction');
Route::post ( '/login', 'AuthenticationController@login' );
Route::any ( '/loginForm', 'AuthenticationController@loginRedirect' );
Route::any ( '/signup', 'AuthenticationController@signupRedirect' );
Route::any ( '/register', 'AuthenticationController@register' );
Route::get ( '/logout', 'AuthenticationController@logout' );
//////Email verification '''''/////
Route::get('register/verify/{id}/{confirmationCode}','AuthenticationController@confirm');

Route::get('auth/facebook', 'AuthenticationController@redirectToProvider');
Route::get('auth/facebook/callback', 'AuthenticationController@handleProviderCallback');

Route::get('login/google', 'AuthenticationController@redirectToGoogleProvider');
Route::get('login/google/callback', 'AuthenticationController@handleProviderGoogleCallback');

Route::get('/propertySearch','PropertyController@internalSearch');
Route::get('/buy','PropertyController@buy');
Route::get('/rent','PropertyController@rent');
Route::get('/projects','PropertyController@project');
Route::get('/wanted','PropertyController@wanted');


    
Route::get('/searchPropertyData','PropertyController@searchPropertyData');
Route::any('/propertyCompare','PropertyController@propertyCompare');


Route::get('/property','PropertyController@searchPropertyData');



Route::post('/editlocation','LocationController@locationedit');
Route::any('LocationCity/{id}','LocationController@getTownList');
Route::any('LocationCity_file/{id}','LocationController@getTownList_file');
Route::any('cityTown_file/{id}','LocationController@getPhaseList_file');
Route::any('cityTown/{id}','LocationController@getPhaseList');
Route::any('townPhase/{id}','LocationController@getBlockList');
// /PropertyController View Count on Number ................

Route::any('viewCount/{id}','PropertyController@viewCount');
Route::get('serSessionforCompare','PropertyController@serSessionforCompare');
Route::get('checks','PropertyController@checkSession');
Route::get('removeSessionCompare','PropertyController@removeSessionCompare');





Route::post('/contactMessage','MessageController@contactMessage');
Route::any('/markMessageAsRead/{id}','MessageController@markMessageAsRead');

/////Mailer on //////
Route::post('sendmessage/{email}','MessageController@contactMessagefromWebsite');

//// DHA property transfer advanced calculator ////
Route::get('/property-transfer-calculator','PropertyTransferCalculatorController@index')->name('property-transfer-calculator.index');
Route::post('/property-transfer-calculator','PropertyTransferCalculatorController@calculate')->name('property-transfer-calculator.calculate');
Route::get('/property-transfer-calculator/result','PropertyTransferCalculatorController@result')->name('property-transfer-calculator.result');

//// all properties for sale//////
Route::get('/property/Buy','PropertyController@propertyBuy');
Route::get('/property/Rent','PropertyController@propertyRent');
Route::get('/property/Wanted','PropertyController@propertyWanted');
Route::get('/property/Project','PropertyController@propertyProject');
////////// Routes for faqs///////////////////////////
Route::any('/help-center','FaqsController@helpCenter');
//////////////Routes of Whyus/////////////////////
Route::any('/career-center','WhyusController@whyusmain');
//////////////Routes of Private Policy/////////////////////
Route::any('/privacy-policy','PrivatePolicyController@privatePolicy');

//////////////Routes of AgencyWebsiteController/////////////////////
Route::any('/agencies','AgencyWebsiteController@mainAgencyList');

//////////////Routes of UserController/////////////////////
Route::any('/architects','UserController@mainArchitectureList');

Route::get('/vendors','UserController@mainVendorList');
////////////////INDEXES Controller//////////////
//Route::any('/indexSearch','IndexController@indexSearch');
Route::any('/indexResult','IndexController@indexResult');
Route::any('/searchindexResult','IndexController@searchResult');

Route::get('/index','IndexController@index');
Route::get('/index/{city_name}/{city_id}','IndexController@index');
Route::get('/index/{city_name}/{city_id}/{town_name}/{town_id}','IndexController@index');

/////////////////////////Maps Routes /////
Route::any('/maps','MapController@frontendSearchMaps');
Route::any('/maps/view/{image}','MapController@areaMap');
Route::any('/addwatermark','PropertyController@addwatermark');
/////Buy internal Routes ///

Route::get('/buy/commercial','PropertyController@commercial');
Route::get('/buy/residential','PropertyController@residential');
Route::get('/buy/plots','PropertyController@plots');
Route::get('/buy/flats','PropertyController@flats');
/////home page find location ////
/////Email Subscription ///

Route::get('/subscribe/email','MailSubscriptionController@emailSubscription');
Route::get('/email/unsubscribe/{email}','MailSubscriptionController@emailUnsubscription');


Route::get('/property/location/{name}','PropertyController@locationSearch');
////change for front page section //// 9/11/2018
Route::get('/property/lahore/{city_id}/{name}/{town_id}','PropertyController@townSearch');
Route::get('/property/karachi/{city_id}/{name}/{town_id}','PropertyController@townSearch');
Route::get('/property/islamabad/{city_id}/{name}/{town_id}','PropertyController@townSearch');

Route::get('/property/islamabad-plots/{city_id}/{name}/{town_id}','PropertyController@plotSearch');
Route::get('/property/lahore-plots/{city_id}/{name}/{town_id}','PropertyController@plotSearch');
Route::get('/property/karachi-plots/{city_id}/{name}/{town_id}','PropertyController@plotSearch');


Route::get('/property/islamabad-rent/{city_id}/{name}/{town_id}','PropertyController@rentSearch');
Route::get('/property/lahore-rent/{city_id}/{name}/{town_id}','PropertyController@rentSearch');
Route::get('/property/karachi-rent/{city_id}/{name}/{town_id}','PropertyController@rentSearch');




// property save route without login
Route::any('favouriteProperty/{id}','PropertyController@favouriteProperty');

/*Porperty Value Assessment Form*/
Route::post('propertyValueAssessment', 'MessageController@propertyValueAssessmentPost');
// Home page Contact form .....///////
Route::post('home_contact_form', 'MessageController@homeContactForm');


Route::group([' middleware' => 'web'], function () {
Route::group(['middleware' =>'auth'], function()
{


Route::any('/tempuploader','HomeController@tempuploader');
Route::any('/tempuploaderprocess','HomeController@tempuploaderprocess');

////////////////////////   AGENCY WEBSITE AgencyWebsiteController    /////////////////////////
// Route::post('/agency/create-website-save','AgencyWebsiteController@addAgencyOverviewSave');
Route::any("/createWebsite/{status}",'AgencyWebsiteController@createWebsite');
Route::any('/deleteWebsiteImage/{id}','AgencyWebsiteController@deleteImage');
Route::get('/agency/create-staff/{id}','AgencyWebsiteController@viewStaffpage');
Route::post('/addStaff/{id}','AgencyWebsiteController@addStaff');
Route::any('/addOffice/{id}','AgencyWebsiteController@addOffice');
Route::any('deleteOffice/{id}','AgencyWebsiteController@deleteOffice');
Route::any('deletestaff/{id}','AgencyWebsiteController@deletestaff');

Route::get('/edit-staff/{id}','AgencyWebsiteController@viewEditStaff');
Route::post('/editStaff/{id}','AgencyWebsiteController@editStaff');
Route::get('/editOffice/{id}','AgencyWebsiteController@viewEditOffice');
Route::post('/editOffice/{id}','AgencyWebsiteController@editOffice');


// Route::get('/themes','AgencyWebsiteController@theme');

Route::any('/deleteTheme/{id}','AgencyWebsiteController@deleteTheme');

Route::any('/check_image/{id}','AgencyWebsiteController@check_image');
Route::get('/directory/agency','AgencyWebsiteController@agencySearchDirectory');
Route::get('/directory/agency/result','AgencyWebsiteController@agencySearchResult');

///////////////////////    AGENCY WEBSITE END ////////////////////





//////////////////Message Controller //////////////////////////////
Route::any('/deleteMessage/{id}','MessageController@deleteMessage');
////////Fetch message  for property ////

Route::get('/getMessageCount','MessageController@getMessageCount');

/////////////////Blogs Controller Routes by Mustafa////////////////

Route::any('/blogDelete/{id}','BlogController@delete');
Route::any('/blogComment/{id}/{c_id}','BlogController@comment_save');
Route::any('/blogComments/{id}','BlogController@parent_comment_save');
Route::any('/update_blog/{id}','BlogController@update_blog');
Route::any('/blogStatusChange/{id}/{s_id}','BlogController@blogStatusChange');
Route::any('/blogTrash','BlogController@blogTrash');
Route::any('/blogRestore/{id}/{s_id}','BlogController@blogRestore');
Route::any('/delete_blog_image/{name}/{id}', 'BlogController@delete_blog_image');
Route::any('/delete_blog_info_graphic/{name}/{id}', 'BlogController@delete_blog_info_graphic');


Route::any('/blogCommentsUpdate/{comment_id}/{comment}','BlogController@blogCommentsUpdate');
Route::any('/commentDelete/{comment_id}','BlogController@commentDelete');


// Route::any('/bloglisting','BlogController@blogListing');

// Admin view only for edit

///////PROFILE Controller ////////

Route::post('/tesing_data','ProfileController@tesing_data');
Route::any('/portfolioDisplay/{id}','ProfileController@portfolioDisplay');

////////Main Controller ///////<br>
Route::get('/main','Controller@upload_multiple_image_save_in_folder');
Route::get('/mainresize','Controller@upload_multiple_image_and_resize_save_in_folder');
//////profile end/////
Route::resource('blogs','BlogController');

/////////////////UserPortfolioController/////////////////////////
    Route::post('/saveportfolio', 'UserPortfolioController@savePortfolio');
    Route::post('/updateportfolio/{id}', 'UserPortfolioController@updatePortfolio');
    Route::any('/deleteimage/{id}/{name}', 'UserPortfolioController@delete_image');
    Route::any('/deleteportfolio', 'UserPortfolioController@delete');

/////////////////UserProductController/////////////////////////
    Route::post('/saveproduct', 'ProductController@saveProduct');
    Route::any('/editproduct/{id}', 'ProductController@editUserProduct');
    Route::post('/updateproduct/{id}', 'ProductController@updateProduct');
    Route::any('/deleteproduct/{id}', 'ProductController@delete');

/////////////////Catagory Controller Routes ///////////////////

Route::any('/categoryStatusChange/{id}/{c_id}','CategoryController@categoryStatusChange');
Route::any('/categoryDelete/{id}','CategoryController@delete');
Route::any('/categoryTrash','CategoryController@categoryTrash');
Route::resource('/category','CategoryController');

///////////////////Packages Controller routes ////////////////////



Route::post('/savePackage', 'PackagesController@savePackage');
// Route::any('/createPackage', 'PackagesController@createPackage');
Route::any('/packageStatusChange/{id}/{s_id}','PackagesController@packageStatusChange');
// Route::any('/packageRestore/{id}/{s_id}','PackagesController@packageRestore');
Route::any('/packageDelete/{id}','PackagesController@packageDelete');
// Route::any('/packageTrash','PackagesController@packageTrash');
// Route::any('/packages','PackagesController@listPackages');
// Route::any('/editPackage/{id}', 'PackagesController@editPackage');
Route::post('/updatePackage/{id}', 'PackagesController@updatePackage');

////////////////////Discount Offer Controller//////////////////////

Route::post('/saveDiscountOffer', 'DiscountOfferController@saveDiscountOffer');
Route::any('/createDiscountOffer', 'DiscountOfferController@createDiscountOffer');
Route::any('/discountOfferStatusChange/{id}/{s_id}','DiscountOfferController@discountOfferStatusChange');
Route::any('/discountOfferRestore/{id}/{s_id}','DiscountOfferController@discountOfferRestore');
Route::any('/discountOfferDelete/{id}','DiscountOfferController@discountOfferDelete');
Route::any('/discountOfferTrash','DiscountOfferController@discountOfferTrash');
Route::any('/discountOffer','DiscountOfferController@listDiscountOffer');
Route::any('/editDiscountOffer/{id}', 'DiscountOfferController@editDiscountOffer');
Route::post('/updateDiscountOffer/{id}', 'DiscountOfferController@updateDiscountOffer');


/////////////////////Tag Controller Routes ////////////////////////

Route::any('/tagTrash','TagController@tagTrash');
Route::any('/tagStatusChange/{id}/{t_id}','TagController@tagStatusChange');
Route::any('/tagDelete/{id}','TagController@delete');
Route::resource('/tag','TagController');

///////////////////////NewsLetterController routes/////////

Route::any('templeteUpload','NewsletterUploaderController@templeteUpload');
Route::any('upload','NewsletterUploaderController@upload');
Route::any('zipFileUpload','NewsletterUploaderController@zipFileUpload');
Route::any('uploadZipFile','NewsletterUploaderController@uploadZipFile');
Route::any('uploadedZipFile','NewsletterUploaderController@uploadedZipFile');


/////////////////Theme Controller/////////////////////////
Route::any('/uploadProfileTheme','ThemeController@uploadProfileTheme');
Route::any('/updateProfiletheme','ThemeController@updateProfiletheme');
Route::any('/uploadUpdatedProfileTheme','ThemeController@uploadUpdatedProfileTheme');
Route::any('/previewProfileTheme','ThemeController@previewProfileTheme');

/////////////////FileUploader Controller///////////////////


Route::any('/uploadImagesView','FileUploadController@uploadImagesView');
Route::any('/blogImageGallery','FileUploadController@blogImageGallery');

Route::any('/valueProperties','FileUploadController@valueProperties');

Route::post('uploaded_images_save','FileUploadController@uploaded_images_save');

////////////////Map Controller ///////////////////////

Route::any('/upload_image_tiles','MapController@upload_image_tiles');
Route::any('/show_container/{image}','MapController@show_container');
Route::any('/show_uploaded_image','MapController@show_uploaded_image');
// Route::any('/maps','MapController@frontendSearchMaps');
// Route::any('/maps/view/{image}','MapController@areaMap');



/////////////////Client Controller Routes //////////////



Route::any('/clientStatusChange/{id}/{c_id}','ClientController@clientStatusChange');
Route::any('/clientDelete/{id}','ClientController@delete');
Route::post('/update_client/{id}','ClientController@update_client');
//Route::any('/image_tiles','ClientController@image_tiles');
Route::resource('client','ClientController');
Route::any('/clientTrash','ClientController@clientTrash');


/////////////Advertising Controller/////////////////
Route::any('/listPackagesForAd/{id}', 'AdvertisingController@listPackagesForAd');
Route::any('/getPackagedetail/{id}', 'AdvertisingController@getPackagedetail');
Route::any('/rejectFeatureAdverteAd/{id}', 'AdvertisingController@rejectFeatureAdverteAd');

Route::any('/savePaidProperty', 'AdvertisingController@savePaidProperty');
// Route::any('/dashboard/user/featured/reject', 'AdvertisingController@userfeaturedRejectlist');
// Route::any('/dashboard/user/featured/approved', 'AdvertisingController@userfeaturedApprovelist');
// Route::any('/dashboard/user/featured/pending', 'AdvertisingController@userfeaturedPendinglist');

// Route::any('/adminPendingFeaturedList', 'AdvertisingController@adminPendingFeaturedList');
// Route::any('/adminRejectFeaturedList', 'AdvertisingController@adminRejectFeaturedList');
// Route::any('/adminApproveFeaturedList', 'AdvertisingController@adminApproveFeaturedList');

// Route::any('/adminAdvertisingPaymentMethod/{u_id}/{paid_property_id}', 'AdvertisingController@adminAdvertisingPaymentMethod');
Route::any('/getdiscountdetail/{id}', 'AdvertisingController@getdiscountdetail');

Route::any('/saveAccountDetail/{id}', 'AdvertisingController@saveAccountDetail');

Route::any('/saveAddStaticAdvertise', 'AdvertisingController@saveAddStaticAdvertise');
Route::any('/dashboard/user/static/ads/reject', 'AdvertisingController@userStaticAdsRejectlist');
Route::any('/dashboard/user/static/ads/approve', 'AdvertisingController@userStaticAdsApprovelist');
Route::any('/dashboard/user/static/ads/pending', 'AdvertisingController@userStaticAdsPendinglist');


// Route::any('/adminStaticAdsPendinglist', 'AdvertisingController@adminStaticAdsPendinglist');
// Route::any('/adminStaticAdsRejectlist', 'AdvertisingController@adminStaticAdsRejectlist');
// Route::any('/adminStaticAdsApprovedlist', 'AdvertisingController@adminStaticAdsApprovedlist');
Route::any('/rejectStaticAd/{id}', 'AdvertisingController@rejectStaticAd');
Route::any('/adminStaticAdsPaymentMethod/{u_id}/{staticAd_id}', 'AdvertisingController@adminStaticAdsPaymentMethod');
Route::any('/saveStaticAccountDetail/{id}', 'AdvertisingController@saveStaticAccountDetail');



////// Ajax  Calling onn Location Controller /////

//// end location controller////////



////////Propert Types Controller CRUD/////////
Route::get('propertyTypes','PropertyTypeController@index');
Route::post('/addPropertyType','PropertyTypeController@store'); 
Route::get('/propertyTypeDelete/{id}','PropertyTypeController@delete');
Route::get('/propertyTypeUntrash/{id}','PropertyTypeController@unTrash');
Route::get('/propertyTypeEdit/{id}','PropertyTypeController@edit');
Route::post('/propertyTypeUpdate/{id}','PropertyTypeController@update');
Route::get('/propertyTypeDetail/{id}','PropertyTypeController@detail');

/////////Type function for Property type



//////////////// Property Controller /////////////////////
Route::post('/trashProperty/{id}','PropertyController@trashProperty');
Route::any('/deleteimageforproperty/{id}/{img_name}','PropertyController@deleteimageforproperty');
Route::any('/delete-video/{id}/{name}','PropertyController@deleteImage');
// Route::post('/editproperty/{id}','PropertyController@editpropertydetails');
// ..........Save property ...... ////
Route::any('saveProperty/{id}','PropertyController@saveProperty');
Route::post('inventory/Search/Result','PropertyController@inventorySearchResult');


////////Check email match ////////
Route::any('/checkEmailExist/{email}','ProfileController@checkEmailExist');
Route::any('/checkPhoneExist/{phone}','ProfileController@checkPhoneExist');

Route::group( ['prefix' => 'dashboard'], function () {
    
    
    ////// Frequent Add  USer Form /////
Route::post('/frequentAddProperty','PropertyController@addFrequentProperty');
Route::get('/quick/add/Property','PropertyController@frequentPropertyForm');



Route::any('inventory/search','PropertyController@inventorySearch');
Route::get('/','DashboardController@dashboard');
/////My saved property ////


Route::get('/saved/property','PropertyController@savedProperty');
Route::any('/unsave/property/{id}','PropertyController@unsaveProperty');
////////////////////////Account controller/////////
Route::any('/user/account/detail','AccountController@userAccountDetail');

    ////Routes For Property //////
Route::get('/property/edit/{id}','PropertyController@editproperty');
/////
//Route For Quick Property Edit page ///////
Route::get('/property/quickedit/{id}','PropertyController@quickEditProperty');
/////////
Route::any('/property/pending','PropertyController@propertyPending');
Route::get('/property','PropertyController@propertyListing');
Route::any('/property/add','PropertyController@index');
Route::any('/property/addindex','PropertyController@addpropertyhome');

// just to get difference from outside and inhouse property uploading
Route::get('/property/addhome','PropertyController@indexForHouseUploading');
Route::get('/property/inhouse','PropertyController@inHousePropertyListing');

/////////Delete project floor plan and Payment plan /////
Route::get('/delete_floor',['as'=>'delete_floor','uses'=>'ProjectController@delete_floor']);
Route::get('/delete_payment_plan',['as'=>'delete_payment_plan','uses'=>'ProjectController@delete_payment_plan']);

// Route::post('/delete_floor','ProjectController@delete_floor');





////////// Routes for faqs///////////////////////////
Route::any('/faqs','FaqsController@faqs');
Route::any('/faqs/create','FaqsController@createFaqs');
Route::any('/faqs/save','FaqsController@saveFaqs');
Route::any('/faqs/edit/{id}','FaqsController@editFaqs');
Route::any('/faqs/update/{id}','FaqsController@updateFaqs');
Route::any('/faqs/delete/{id}','FaqsController@deleteFaqs');
Route::any('/faqs/trash','FaqsController@trashFaqs');
Route::any('/faqs/change/status/{id}/{status_id}','FaqsController@changeStatusFaqs');

////////////////Route Of Why Us////////////////////////
Route::any('/career-center/edit','WhyusController@edit');
Route::any('/career-center/update','WhyusController@update');

////////////////Route Of Private Policy////////////////////////
Route::any('/privatePolicy/edit','PrivatePolicyController@edit');
Route::any('/privatePolicy/update','PrivatePolicyController@update');

////// Active  & De-Active ////////
Route::any('/propertyBlockorActive/{id}','PropertyController@propertyBlockorActive');



///Routes for Project
Route::any('/project/edit/{id}','ProjectController@editProject');
Route::get('/project/pending','ProjectController@listPendingProject');
Route::get('/project','ProjectController@userProjectListing');
Route::get('/project/add','PropertyController@viewProject');


//////Routes for  staff  and offices ////

Route::get('/agency/office/{id}','AgencyWebsiteController@viewOfficePage');
Route::get('/agency/staff/{id}','AgencyWebsiteController@viewStaffpage');


////PRifle Controller Routes
Route::get('/profile/edit','ProfileController@profileEdit');
Route::get('/profile/view','ProfileController@viewProfile');


//////Message Route for personal property
Route::get('/message','MessageController@messages_List');


///////Themes /////////////

Route::get('/themes','AgencyWebsiteController@theme');
Route::any('/activateTheme/{id}','AgencyWebsiteController@changeTheme');
///////Demo theme view /////

Route::get('/demo-theme/{id}/{name}','AgencyWebsiteController@demoTheme');

// Route::any('/createprofileTheme','ThemeController@createprofileTheme');

//////client ///////////

// Route::resource('client','ClientController');
// Route::any('/client/trash','ClientController@clientTrash');
Route::any('user/search/history','SearchTrachController@userSearchHistory');
Route::any('search/history','SearchTrachController@searchHistory');
/////Advertisment ////

Route::any('/user/active/advertising','AdvertisingController@userActiveAdvertisinglist');
Route::any('/user/featured/advertising', 'AdvertisingController@userfeaturedPendinglist');
Route::any('/user/static/advertise', 'AdvertisingController@addStaticAdvertise');
Route::any('/user/static/add/pending', 'AdvertisingController@userStaticAdsPendinglist');

/////////website Routes ////

Route::get('/agency/website/{id}','AgencyWebsiteController@addAgencyOverview');
Route::post('/agency/create-website-save','AgencyWebsiteController@addAgencyOverviewSave');


////// Portfolio ...////

Route::any('/portfolio', 'UserPortfolioController@createPortfolio');
Route::any('/product', 'ProductController@addProduct');

//////  visit profile  /////
// Route::get('/profile/pk1000-{id}/{name}','ProfileController@viewProileByAll');
Route::get('/vendor/pk1000-{id}/{name}','ProfileController@viewProileByAll');
Route::get('/architecture/pk1000-{id}/{name}','ProfileController@viewProileByAll');


Route::any('/edit/portfolio/{id}', 'UserPortfolioController@editUserPortfolio');


//// Featured Property Routes User ////////////
Route::any('/user/featured/reject', 'AdvertisingController@userfeaturedRejectlist');
Route::any('/user/featured/approved', 'AdvertisingController@userfeaturedApprovelist');
Route::any('/user/featured/pending', 'AdvertisingController@userfeaturedPendinglist');

//////Featured Static ADs 
Route::any('/user/static/ads/reject', 'AdvertisingController@userStaticAdsRejectlist');
Route::any('/user/static/ads/approve', 'AdvertisingController@userStaticAdsApprovelist');
Route::any('/user/static/ads/pending', 'AdvertisingController@userStaticAdsPendinglist');


/////////Directory search for vendor and acchitecture

Route::any('/architecture/search','UserController@architectureInventorySearch');
Route::any('/architecture/search/result','UserController@architectureInventorySearchResult');
Route::any('/vendor/search','UserController@vendorInventorySearch');
Route::any('/vendor/search/result','UserController@vendorInventorySearchResult');


// ////// Static Add List /////

// Route::any('/user/static/ads/reject', 'AdvertisingController@userStaticAdsRejectlist');
// Route::any('/user/static/ads/approve', 'AdvertisingController@userStaticAdsApprovelist');
// Route::any('/user/static/ads/pending', 'AdvertisingController@userStaticAdsPendinglist');


//////////

Route::post('/edit/property/{id}','PropertyController@editpropertydetails');
/////Edit property from Frequent edit page ....///
Route::post('/EditFrequentProperty/property/{id}','PropertyController@EditFrequentProperty');



////file system //////
Route::get('files',['as'=>'addfiles','uses'=>'FileController@addFiles']);
Route::post('/delete_files',['as'=>'delete.file','uses'=>'FileController@delete_files']);
Route::post('addfileName',['as'=>'addfileName','uses'=>'FileController@addfileName']);
Route::get('/file/{id}/{file_title}',['as'=>'filelist','uses'=>'FileController@fileListing']);
Route::post('/addfiles',['as'=>'file.listing','uses'=>'FileController@addFileListing']);


});

Route::any('/addproperty','PropertyController@addproperty');

/////just for Software House Uploading //
Route::any('/addpropertyForHouse','PropertyController@addpropertyForHouse');


Route::any('/addproject','ProjectController@addproject');
Route::any('/updateProject/{id}','ProjectController@updateProject');
/////////////// End Property Controller//////////////////////
Route::get('/typeDetailDelete/{id}','PropertyTypeController@typeDelete');
Route::get('/typeDetailEdit/{id}','PropertyTypeController@typeEdit');
Route::get('/typeDetailReterive/{id}','PropertyTypeController@typeReterive');
    
/////////////////
/////////////////////USER COntroller //////////////////
Route::any('blockORactive/{id}','UserController@blockOrActive');
Route::post('/trashUser/{id}','UserController@destroy');
Route::any('/updateUser/{id}','UserController@updateUser');
Route::any('/updateAgent','UserController@updateAgent');
Route::any('/updateAV','UserController@updateAV');


// Route::any('/directory/architecture','UserController@architectureInventorySearch');
// Route::any('/directory/architecture/result','UserController@architectureInventorySearchResult');
// Route::any('/directory/vendor','UserController@vendorInventorySearch');
// Route::any('/directory/vendor/result','UserController@vendorInventorySearchResult');



Route::get('/users/trash','UserController@showTrash');

Route::any('/user/retrieve/{id}','UserController@retrieveTrash');
Route::get('/assignCharacterRole','UserController@assignCharacterRole');
Route::resource('/users','UserController');
Route::get('/check','RoleController@test');
Route::resource('/roles','RoleController');

//////////  Character Type  Routes  //////////
Route::get('charactertype','CharacterTypeController@index');
Route::post('characterTypeAdd','CharacterTypeController@store');
Route::get('characterTypeDelete/{id}','CharacterTypeController@destroy');
Route::get('characterTypeReterive/{id}','CharacterTypeController@reterive');
Route::get('characterTypeEdit/{id}','CharacterTypeController@edit');
Route::post('characterTypeUpdate/{id}','CharacterTypeController@update');


///////DashBoard Routing Area..///////////////////////////////



////////Interest Routing Area   7/11/17

Route::get('/interest','InterestController@index');
Route::post('/interest','InterestController@store');
Route::get('/interest/{id}','InterestController@delete');
Route::get('/reterive/{id}','InterestController@reterive');
Route::get('/interest/edit/{id}','InterestController@edit');
Route::post('/updateInterest/{id}','InterestController@update');
Route::post('/assignInterest','InterestController@assignInterest');
//// End Character Type Routes  ////////////




///////////////History Controller///////////////////



Route::get('/password',function(){

    return view('user.resetPassword');
});
Route::any('resetpassword','PasswordController@resetPassword');
});


Route::group(['middleware' =>'admin','auth'], function(){

Route::get('dashboard/profile/pk1000-{id}/{name}','ProfileController@viewProileByAll');

Route::group(['prefix' => 'dashboard/admin'],function(){
//////Activated website list /////


Route::get('/website','AgencyWebsiteController@websites');
    ///////Search user property admin routes /////
Route::get('/search/user/property','PropertyController@searchUserProperties');
Route::any('search/history','SearchTrachController@searchHistory');
Route::POST('/search/user/property','PropertyController@searchForUser');

///// admin routes user listing  ///////
Route::get('/users','UserController@userList');


    ////Admin Routes locations /////
Route::get('/location/add','LocationController@index');
Route::any('/location/edit','LocationController@edit');
Route::get('/allProperties/{id}','PropertyController@allProperties');   
Route::any('/createprofileTheme','ThemeController@createprofileTheme');


/////Admin Website routes //////
Route::get('/websiteRequestList','AgencyWebsiteController@websiteRequestList');
Route::get('/websitedeActivationList','AgencyWebsiteController@websitedeActivationList');
Route::post('/search/activated/website','AgencyWebsiteController@searchActivatedWebsite');
Route::post('/search/deactivated/website','AgencyWebsiteController@searchdeactivatedWebsite');
Route::get('/websiteActivationList','AgencyWebsiteController@websiteActivationList');
Route::any('activateWebsite/{id}','AgencyWebsiteController@activateWebsite');
Route::any('deactivateWebsite/{id}','AgencyWebsiteController@deactivateWebsite');



////admin property listing pages routes //////
Route::get('/property/pending','PropertyController@propertyListingForAdminPending');
Route::get('/property/active','PropertyController@propertyListingForAdminActive');
Route::get('/property/trash','PropertyController@propertyListingForAdminTrash');
////////admin project listing page routes////////////////////
Route::get('/project/pending','ProjectController@allPendingProject');
Route::get('/project/active','ProjectController@allActiveInActiveProject');
Route::get('/project/trash','ProjectController@allTrashProject');


/////Admin Featured Property Listing 


Route::any('/static/ads/pending', 'AdvertisingController@adminStaticAdsPendinglist');
Route::any('/static/ads/reject', 'AdvertisingController@adminStaticAdsRejectlist');
Route::any('/static/ads/approve', 'AdvertisingController@adminStaticAdsApprovedlist');

////Admin Featured PRoperties/ ///////
Route::any('/featured/pending', 'AdvertisingController@adminPendingFeaturedList');
Route::any('/featured/reject', 'AdvertisingController@adminRejectFeaturedList');
Route::any('/featured/approved', 'AdvertisingController@adminApproveFeaturedList');


/////
Route::any('/advertising/payment/method/{u_id}/{paid_property_id}', 'AdvertisingController@adminAdvertisingPaymentMethod');


/////Packages ///
Route::any('/create/package', 'PackagesController@createPackage');
Route::any('/packages','PackagesController@listPackages');
Route::any('/edit/package/{id}', 'PackagesController@editPackage');
Route::any('/package/trash','PackagesController@packageTrash');
Route::any('/package/restore/{id}/{s_id}','PackagesController@packageRestore');


/////DHA Property Transfer Calculator — Tax Rules & Societies admin CRUD/////
Route::prefix('tax-rules')->name('admin.tax-rules.')->group(function () {
    Route::get('/', '\App\Http\Controllers\Admin\TaxRuleController@index')->name('index');
    Route::get('/create', '\App\Http\Controllers\Admin\TaxRuleController@create')->name('create');
    Route::post('/', '\App\Http\Controllers\Admin\TaxRuleController@store')->name('store');
    Route::get('/export-csv', '\App\Http\Controllers\Admin\TaxRuleController@exportCsv')->name('export-csv');
    Route::post('/import-csv', '\App\Http\Controllers\Admin\TaxRuleController@importCsv')->name('import-csv');
    Route::get('/{taxRule}/edit', '\App\Http\Controllers\Admin\TaxRuleController@edit')->name('edit');
    Route::put('/{taxRule}', '\App\Http\Controllers\Admin\TaxRuleController@update')->name('update');
    Route::delete('/{taxRule}', '\App\Http\Controllers\Admin\TaxRuleController@destroy')->name('destroy');
    Route::post('/{taxRule}/toggle-status', '\App\Http\Controllers\Admin\TaxRuleController@toggleStatus')->name('toggle-status');
    Route::post('/{taxRule}/clone', '\App\Http\Controllers\Admin\TaxRuleController@clone')->name('clone');
});

Route::prefix('societies')->name('admin.societies.')->group(function () {
    Route::get('/', '\App\Http\Controllers\Admin\SocietyController@index')->name('index');
    Route::get('/create', '\App\Http\Controllers\Admin\SocietyController@create')->name('create');
    Route::post('/', '\App\Http\Controllers\Admin\SocietyController@store')->name('store');
    Route::get('/{society}/edit', '\App\Http\Controllers\Admin\SocietyController@edit')->name('edit');
    Route::put('/{society}', '\App\Http\Controllers\Admin\SocietyController@update')->name('update');
    Route::delete('/{society}', '\App\Http\Controllers\Admin\SocietyController@destroy')->name('destroy');
    Route::post('/{society}/toggle-status', '\App\Http\Controllers\Admin\SocietyController@toggleStatus')->name('toggle-status');
    Route::post('/{society}/blocks', '\App\Http\Controllers\Admin\SocietyController@storeBlock')->name('blocks.store');
    Route::delete('/{society}/blocks/{block}', '\App\Http\Controllers\Admin\SocietyController@destroyBlock')->name('blocks.destroy');
    Route::post('/{society}/blocks/{block}/toggle-status', '\App\Http\Controllers\Admin\SocietyController@toggleBlockStatus')->name('blocks.toggle-status');
});

});
Route::any('/propertyActiveOrUnactiveByAdmin/{id}','PropertyController@propertyActiveOrUnactiveByAdmin');
Route::post('/trashPropertyToActive/{id}','PropertyController@trashPropertyToActive');


Route::any('/changeStatusofproperty/{status}/{id}','PropertyController@changeStatusofproperty');
Route::get('/dashboard/about-us-content', 'AboutController@edit');
Route::any('/dashboard/about-us-content-save', 'AboutController@update');


////View Website Activation ////////////////////////
/////////Location     controller/////////
Route::post('/addlocation','LocationController@store');

Route::any('updateTown/{id}','LocationController@updateTown');


///Asign Map to phase ///

Route::get('/dashboard/mapToPhase','MapController@mapToPhase');
Route::post('/assignMaptoPhase','MapController@assignMaptoPhase');
});
// Route::delete('/{id}','UserController@destroy');
///////property page send message ..../////
Route::get('/{url}','AgencyWebsiteController@websiteUrl');


/////meta .//////
Route::post('/dashboard/meta/update/{id}','MetaController@storeMeta');
Route::get('/dashboard/meta','MetaController@index')->name('meta');
Route::post('/dashboard/meta/store','MetaController@store');




});   
//Dashboard Controller

