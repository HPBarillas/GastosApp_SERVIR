<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\DonationsController;
            

Route::get('/', function () {return redirect('sign-in');})->middleware('guest');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::get('sign-in', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('sign-in', [SessionsController::class, 'store'])->middleware('guest');

Route::post('verify', [SessionsController::class, 'show'])->middleware('guest');
Route::get('verify', function () {
	return view('sessions.password.verify');
})->middleware('guest')->name('verify'); 

Route::post('sign-out', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');
Route::get('profile', [ProfileController::class, 'create'])->middleware('auth')->name('profile');
Route::post('user-profile', [ProfileController::class, 'update'])->middleware('auth');

Route::group(['middleware' => 'auth'], function () {

	//Project
    Route::get('project-management',
		[DonationsController::class, 'getProjects']
	)->name('project-management');

    Route::get('project-describe/{projectId}',
		[DonationsController::class, 'getProject']
	)->name('project-describe');

	Route::post(
		'/new-project',
		[DonationsController::class, 'newProject']
	)->name('new-project');

	Route::post(
		'/describe-project-update',
		[DonationsController::class, 'updateProject']
	)->name('describe-project-update');

	Route::post(
		'/project-service-new',
		[DonationsController::class, 'newProjectService']
	)->name('project-service-new');

	Route::post(
		'/project-service-update',
		[DonationsController::class, 'updateProjectService']
	)->name('project-service-update');

	//Service
	Route::get('services-management',
		[DonationsController::class, 'getServices']
	)->name('services-management');

	Route::post(
		'/new-service',
		[DonationsController::class, 'newService']
	)->name('new-service');

	Route::post(
		'/describe-service-update',
		[DonationsController::class, 'updateService']
	)->name('describe-service-update');

	//Donations
	Route::get('donations-management',
		[DonationsController::class, 'getDonations']
	)->name('donations-management');

	Route::post(
		'/new-donation',
		[DonationsController::class, 'newDonation']
	)->name('new-donation');

	Route::post(
		'/describe-donation-update',
		[DonationsController::class, 'updateDonation']
	)->name('describe-donation-update');

	Route::post(
		'/describe-donation-make',
		[DonationsController::class, 'makeDonation']
	)->name('describe-donation-make');

	//purchase

	Route::get('purchase-management',
		[DonationsController::class, 'getPurchases']
	)->name('purchase-management');

    Route::get('purchase-describe/{purchaseId}',
		[DonationsController::class, 'getPurchase']
	)->name('purchase-describe');

	Route::post(
		'/new-purchase',
		[DonationsController::class, 'newPurchase']
	)->name('new-purchase');

	
	Route::get('static-sign-in', function () {
		return view('pages.static-sign-in');
	})->name('static-sign-in');
	
	Route::get('static-sign-up', function () {
		return view('pages.static-sign-up');
	})->name('static-sign-up');
		
	Route::get('user-profile', function () {
		return view('pages.laravel-examples.user-profile');
	})->name('user-profile');
});