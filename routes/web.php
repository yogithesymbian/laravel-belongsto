<?php
use App\User;
use App\Country;
use App\Article;
use App\Comment;

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
// $username = User::whereHas('comment', function ($query) use ($user) {
//     $query->whereUserId($username->name);
// })->get;

// Route::get('/', function () {
//     // return view('welcome');
//     /**
//      * *this will view json object
//      * ?LIKE API
//      */
//     // echo Article::all();
//     # one to many 1 - 6
//     $articles = Article::all();

//     return View::make('/article/article')->with('articles', $articles);
// });
Route::get('/', function () {
    $articles = Article::all();

    return View::make('/article/article')->with('articles', $articles);
});
/**
 * ? this one-to-many [2-6]
 *
 */
# json name
// Route::get('profile/{username}', function ($name) {
//     dd($name);
// });
# detail json full user table
// Route::get('profile/{username}', function ($name) {
//     $user = User::where('name', $name)->first();
//     dd($user);
// });
/**
 * pass the parameter {username} with function $username
 */
Route::get('profile/{username}', function ($username) {
    $user = User::where('name', $username)->firstOrFail();

    return view('/user/profile')->with('user', $user);
});
/**
 * Has Many Through [5/6]
 */
Route::get('posts/country/{countryId}', function ($countryId) {
    $country = Country::findOrFail($countryId);

    return view('country_post')->with('country', $country);
});

Route::get('article', function () {
    echo Comment::all();
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
