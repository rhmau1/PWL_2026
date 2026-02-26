<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PageController::class, 'index']);

Route::get('/world', function () {
    return 'world';
});
Route::get('/about', [PageController::class, 'about']);
Route::get('/user/{name}', function ($name) {
    return 'nama saya, ' . $name;
});
Route::get('/user/{name?}', function ($name = null) {
    return 'nama saya, ' . $name;
});
// Route::get('/articles/{id}', function ($id) {
//     return 'halaman artikel dengan id: ' . $id;
// });
Route::get('/articles/{id}', [PageController::class, 'articles']);
Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'post ke: ' . $postId . ', comment ke: ' . $commentId;
});
Route::get('/user/profile', function () {
    //
})->name('profile');
// Route::get(
//     '/user/profile',
//     [UserProfileController::class, 'show']
// )->name('profile');
// Generating URLs...
// $url = route('profile');
// Generating Redirects...
// return redirect()->route('profile');
Route::middleware(['first', 'second'])->group(function () {
    Route::get('/', function () {
        // Uses first & second middleware...
    });
    Route::get('/user/profile', function () {
        // Uses first & second middleware...
    });
});
Route::domain('{account}.example.com')->group(function () {
    Route::get('user/{id}', function ($account, $id) {
        //
    });
});
// Route::middleware('auth')->group(function () {
//     Route::get('/user', [UserController::class, 'index']);
//     Route::get('/post', [PostController::class, 'index']);
//     Route::get('/event', [EventController::class, 'index']);
// });
// Route::prefix('admin')->group(function () {
//     Route::get('/user', [UserController::class, 'index']);
//     Route::get('/post', [PostController::class, 'index']);
//     Route::get('/event', [EventController::class, 'index']);
// });
Route::redirect('/here', '/there');
Route::view('/welcome', 'welcome');
Route::view('/welcome', 'welcome', ['name' => 'Taylor']);
Route::resource('photos', PhotoController::class);
Route::resource('photos', PhotoController::class)->only([
    'index',
    'show'
]);
Route::resource('photos', PhotoController::class)->except([
    'create',
    'store',
    'update',
    'destroy'
]);
Route::get('/greeting', function () {
    return view('blog.hello', ['name' => 'Andi']);
});
