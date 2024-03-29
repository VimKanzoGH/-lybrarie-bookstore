<?php

use App\Entities\Book;
use App\Entities\Author;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function() {
    $books = Book::where('publish', 1)->latest()->get();

    $userBooks = Auth::check() ? auth()->user()->books()->pluck('book_id')->toArray() : [];

    return view('index', compact('books', 'userBooks'));
})->name('home');

Route::get('/book/{slug}', function($slug) {
    $book = Book::where('slug', $slug)->first();
    return view('book', compact('book'));
})->name('book');

Route::get('/books/author/{id}', function($slug) {
    $authorBooks = Author::with('books')->get();
    return view('author-books-listing', compact('authorBooks'));
})->name('author_book');

Route::view('about', 'about')->name('about');
Route::view('contact', 'contact')->name('contact');

// Route::get('full-text-search', 'HomeController@index');
Route::post('search/action', 'HomeController@booksSearch')->name('search_query');

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::group(['prefix' => 'wallet', 'as' => 'wallet.'], function() {
        Route::get('/', 'HomeController@wallet')->name('index');
        Route::get('{id}/buy', 'HomeController@wallet_buy')->name('buy');
    });

    Route::group(['prefix' => 'library', 'as' => 'library.'], function() {
        Route::get('/', 'HomeController@library')->name('index');
        Route::get('/{slug}', 'HomeController@book')->name('book');

        Route::get('/{id}/buy', 'HomeController@book_buy')->name('book.buy');
    });

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'admin'], function() {
        Route::resource('users', 'UserController')->except(['show']);
        Route::resource('roles', 'RoleController')->except(['show']);
        Route::resource('plans', 'PlanController')->except(['show']);
        Route::resource('authors', 'AuthorController')->except(['show']);
        Route::resource('genres', 'GenreController')->except(['show']);
        Route::resource('books', 'BookController');
    });
});
