<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


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
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->get('/dashboard', function () {
    return view('TestLivewire');
})->name('welcome');

//Route::post('/home', [App\Http\Controllers\HomeController::class, 'loginuser'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');  

//admin panel routes

Route::get('/adminhome', [App\Http\Controllers\HomeController::class, 'AdminDrashBoard']);

Route::get('/userlist/{id}', [App\Http\Controllers\HomeController::class, 'deleteuser'])->name('deleteaction');
Route::get('/userlist', [App\Http\Controllers\HomeController::class, 'show']);

Route::get('/addCategories', [App\Http\Controllers\HomeController::class, 'showCategories']);
Route::post('/addCategories', [App\Http\Controllers\HomeController::class, 'Categories']);

Route::get('/addsubCategories', [App\Http\Controllers\HomeController::class, 'showsubCategories']);
Route::post('/addsubCategories', [App\Http\Controllers\HomeController::class, 'subCategories']);


Route::get('/addProduct', [App\Http\Controllers\HomeController::class, 'showProduct']);
Route::get('/get-subcategories/{cat}', [App\Http\Controllers\HomeController::class, 'catagoryChoose']);
Route::post('/save-product', [App\Http\Controllers\HomeController::class, 'SaveProduct']);

Route::get('/viewProduct', [App\Http\Controllers\HomeController::class, 'viewProduct']);
Route::get('/viewProductpagenation', [App\Http\Controllers\HomeController::class, 'viewProductpagenation']);
Route::get('/viewProductpagenation_data', [App\Http\Controllers\HomeController::class, 'fetch_data']);
Route::get('/pagenation', [App\Http\Controllers\HomeController::class, 'pagenation_data']);



Route::get('/viewProduct/{id}', [App\Http\Controllers\HomeController::class, 'DeleteProduct']);
Route::get('/editProduct/{id}', [App\Http\Controllers\HomeController::class, 'ShowEditProduct']);
Route::post('/editProductt', [App\Http\Controllers\HomeController::class, 'EditProduct']);
Route::get('/editsubcategory/{cat}', [App\Http\Controllers\HomeController::class, 'Editsubcategory']);


//user panel routes

Route::get('/get_product/{subcat}', [App\Http\Controllers\HomeController::class, 'getProduct']);
Route::get('/user_show_subcategories',[App\Http\Controllers\HomeController::class, 'user_show_subcategories']);

Route::get('/view_product/{id}', [App\Http\Controllers\HomeController::class, 'view_product']);
Route::post('/add_to_cart/{id}', [App\Http\Controllers\HomeController::class, 'add_to_cart']);

Route::get('/view_cart', [App\Http\Controllers\HomeController::class, 'view_cart']);
Route::get('/remove_from_cart/{id}', [App\Http\Controllers\HomeController::class, 'remove_from_cart']);


Route::get('proceed_to_checkout',[App\Http\Controllers\HomeController::class, 'proceed_to_checkout']);

Route::post('save_order',[App\Http\Controllers\HomeController::class, 'save_order']);

Route::get('formdata',[App\Http\Controllers\HomeController::class, 'get_form']);
Route::post('formdata',[App\Http\Controllers\HomeController::class, 'set_form']);

Route::get('formdataparsely',[App\Http\Controllers\HomeController::class, 'get_formparsely']);
Route::post('parsely',[App\Http\Controllers\HomeController::class, 'set_formparsely']);

Route::get('datatable',[App\Http\Controllers\HomeController::class, 'get_tableData']);

Route::get('exportdata',[App\Http\Controllers\HomeController::class, 'exportdata']);

Route::get('view_calender',[App\Http\Controllers\eventcontroller::class, 'getCalender']);
Route::post('create_Events', [App\Http\Controllers\eventcontroller::class, 'createEve']);
Route::post('edit-event', [App\Http\Controllers\eventcontroller::class, 'editevent']);
Route::post('update-event', [App\Http\Controllers\eventcontroller::class, 'updatevent']);
Route::delete('destroy', [App\Http\Controllers\eventcontroller::class, 'deletevent']);

Route::get('display_calender', [App\Http\Controllers\eventcontroller::class, 'show_calender']);


Route::get('messages',[App\Http\Controllers\HomeController::class, 'messages']);
Route::get('Showwhether',[App\Http\Controllers\HomeController::class, 'Showwhether']);
Route::post('submitData',[App\Http\Controllers\HomeController::class, 'submitData']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/livewire', [App\Http\Controllers\HomeController::class, 'livewireTable'])->name('livewireTable');
Route::get('/livewire', [App\Http\Controllers\HomeController::class, 'DeletelivewireTable'])->name('DeletelivewireTable');

Route::get('/ShowTailwindForm', [App\Http\Controllers\HomeController::class, 'ShowTailwindForm'])->name('ShowTailwindForm');
Route::get('/ShowAutoComplete', [App\Http\Controllers\HomeController::class, 'ShowAutoComplete'])->name('ShowAutoComplete');


