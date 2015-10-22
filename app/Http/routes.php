<?php

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'HomeController@index');
Route::get('/site/{slug}', 'HomeController@page');
Route::get('/team/{type}', 'HomeController@team');
Route::get('/alumni', 'HomeController@alumni');
Route::get('/form', 'HomeController@form');
Route::get('/courses', 'HomeController@courses');
Route::get('/course/{id}', 'HomeController@course');
Route::get('/module/{id}/{course}', 'HomeController@module');

Route::post('sendMessage', ['uses' => 'HomeController@sendMessage']);

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'admin', 'middleware' => ['auth','administration']], function () {

    Route::get('/', 'Backend\AdminController@index');
    Route::get('acc', 'Backend\AdminController@acc');
    Route::post('upload', 'Backend\UploadController@upload');
    Route::resource('page', 'Backend\PageController');
    Route::resource('alumni', 'Backend\AlumniController');
    Route::resource('team', 'Backend\TeamController');
});

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

Route::get('auth/login',  'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

/*
|--------------------------------------------------------------------------
| Registration Routes
|--------------------------------------------------------------------------
*/

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

/*
|--------------------------------------------------------------------------
| Password reset link request Routes
|--------------------------------------------------------------------------
*/

Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

/*
|--------------------------------------------------------------------------
|  Password reset Routes
|--------------------------------------------------------------------------
*/

Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::get('testing', function()
{

    // 'title', 'intro','content','slug','editable'

    $pages = [
        ['id' => 1, 'title' => 'Welcome to the Swiss Arbitration Academy SAA', 'slug' => 'home', 'editable' => 1],
        ['id' => 2, 'title' => 'About', 'slug' => 'about', 'editable' => 1,
            'children' => [
                ['id' => 3, 'title' => 'Vision', 'slug' => 'vision', 'editable' => 1],
                ['id' => 4, 'title' => 'Endorsement', 'slug' => 'endorse', 'editable' => 1],
                ['id' => 5, 'title' => 'Publications', 'slug' => 'publications', 'editable' => 1]
            ]
        ],
        ['id' => 2, 'title' => 'Courses', 'slug' => 'about', 'editable' => 1],
        ['id' => 6, 'title' => 'Tuition Fees', 'slug' => 'tuition', 'editable' => 1],
        ['id' => 7, 'title' => 'Team', 'slug' => 'team', 'editable' => 1,
            'children' => [
                ['id' => 8, 'title' => 'The SAA Academic Council', 'slug' => 'council', 'editable' => 1],
                ['id' => 9, 'title' => 'The SAA guest lecturers', 'slug' => 'guest', 'editable' => 1],
                ['id' => 10, 'title' => 'The SAA Advisory Committee', 'slug' => 'committee', 'editable' => 1]
            ]
        ],
        ['id' => 11, 'title' => 'Apply', 'slug' => 'apply', 'editable' => 1],
        ['id' => 12, 'title' => 'Alumni', 'slug' => 'alumni', 'editable' => 1],
        ['id' => 13, 'title' => 'Contact', 'slug' => 'contact', 'editable' => 1],
        ['id' => 14, 'title' => 'The Swiss Arbitration Academy proudly announces the 2016 SAA Grant', 'slug' => 'grant', 'editable' => 1],
        ['id' => 15, 'title' => 'The Swiss Arbitration Academy proudly announces the 2014 Hill International Grant', 'slug' => 'hill', 'editable' => 1],
        ['id' => 15, 'title' => 'Legal Structure', 'slug' => 'legal', 'editable' => 1],
        ['id' => 15, 'title' => 'Archives', 'slug' => 'archives', 'editable' => 1],
    ];

    //\App\Saa\Page\Entities\Page::buildTree($pages);

    $helper = \App::make('App\Saa\Page\Worker\PageWorkerInterface');

    $page   =  new \App\Saa\Page\Entities\Page();
    $pages  = $page->whereNull('parent_id')->where('rang','>',0)->orderBy('rang','asc')->get();

    foreach($pages as $page){
        echo $helper->renderMenu($page);
    }

});

