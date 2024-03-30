<?php

use App\Http\Controllers\AdminPanel\AdminController;
use App\Http\Controllers\event\ChairClassController;
use App\Http\Controllers\event\ChairController;
use App\Http\Controllers\event\ClassesController;
use App\Http\Controllers\event\Event_placeController;
use App\Http\Controllers\event\EventController;
use App\Http\Controllers\event\InvitationsController;
use App\Http\Controllers\event\Nicknames2Controller;
use App\Http\Controllers\event\NicknamesController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\Svu\ProgramController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;







Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ] // يحتف باللغة عند تسكير الموقع
    ], function(){

        //Route::middleware(['role:admin|staff'])->group(function () {
        Route::middleware(['auth'])->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });

        Route::middleware(['auth','isAdmin'])->group(function () {

            Route::resource('roles', RolesController::class);
            Route::resource('permissions', PermissionsController::class);
            Route::resource('users', UserController::class);
            Route::patch('/{user}/updatepermissions',[UserController::class,'updatepermissions'])->name('users.updatepermissions')->middleware('permission_role:updatepermissions');


            Route::get('/admin/dashboard', [AdminController::class,'index'])->name('admin.dashboard');

            Route::group(['prefix' => 'classes'], function() {
                Route::get('/', [ClassesController::class, 'index'])->name('classes.index');
                Route::get('/create',  [ClassesController::class, 'create'])->name('classes.create');
                Route::post('/create',  [ClassesController::class, 'store'])->name('classes.store');
                Route::get('/{class}/show',  [ClassesController::class, 'show'])->name('classes.show');
                Route::get('/{class}/edit',  [ClassesController::class, 'edit'])->name('classes.edit');
                Route::patch('/{class}/update',  [ClassesController::class, 'update'])->name('classes.update');
                Route::delete('/{class}/delete',  [ClassesController::class, 'destroy'])->name('classes.destroy');
            });
            Route::group(['prefix' => 'nicknames'], function() {
                Route::get('/', [NicknamesController::class, 'index'])->name('nicknames.index');
                Route::get('/create',  [NicknamesController::class, 'create'])->name('nicknames.create');
                Route::post('/create',  [NicknamesController::class, 'store'])->name('nicknames.store');
                Route::get('/{nickname}/show',  [NicknamesController::class, 'show'])->name('nicknames.show');
                Route::get('/{nickname}/edit',  [NicknamesController::class, 'edit'])->name('nicknames.edit');
                Route::patch('/{nickname}/update',  [NicknamesController::class, 'update'])->name('nicknames.update');
                Route::delete('/{nickname}/delete',  [NicknamesController::class, 'destroy'])->name('nicknames.destroy');
            });
            Route::group(['prefix' => 'nicknames2'], function() {
                Route::get('/', [Nicknames2Controller::class, 'index'])->name('nicknames2.index');
                Route::get('/create',  [Nicknames2Controller::class, 'create'])->name('nicknames2.create');
                Route::post('/create',  [Nicknames2Controller::class, 'store'])->name('nicknames2.store');
                Route::get('/{nickname2}/show',  [Nicknames2Controller::class, 'show'])->name('nicknames2.show');
                Route::get('/{nickname2}/edit',  [Nicknames2Controller::class, 'edit'])->name('nicknames2.edit');
                Route::patch('/{nickname2}/update',  [Nicknames2Controller::class, 'update'])->name('nicknames2.update');
                Route::delete('/{nickname2}/delete',  [Nicknames2Controller::class, 'destroy'])->name('nicknames2.destroy');
            });
            Route::group(['prefix' => 'chairclasses'], function() {
                Route::get('/', [ChairClassController::class, 'index'])->name('chairclasses.index');
                Route::get('/create',  [ChairClassController::class, 'create'])->name('chairclasses.create');
                Route::post('/create',  [ChairClassController::class, 'store'])->name('chairclasses.store');
                Route::get('/{chairclass}/show',  [ChairClassController::class, 'show'])->name('chairclasses.show');
                Route::get('/{chairclass}/edit',  [ChairClassController::class, 'edit'])->name('chairclasses.edit');
                Route::patch('/{chairclass}/update',  [ChairClassController::class, 'update'])->name('chairclasses.update');
                Route::delete('/{chairclass}/delete',  [ChairClassController::class, 'destroy'])->name('chairclasses.destroy');

            });
            Route::group(['prefix' => 'chairs'], function() {
                Route::get('/', [ChairController::class, 'index'])->name('chairs.index');
                Route::get('/create',  [ChairController::class, 'create'])->name('chairs.create');
                Route::post('/create',  [ChairController::class, 'store'])->name('chairs.store');
                Route::get('/{chair}/show',  [ChairController::class, 'show'])->name('chairs.show');
                Route::get('/{chair}/edit',  [ChairController::class, 'edit'])->name('chairs.edit');
                Route::patch('/{chair}/update',  [ChairController::class, 'update'])->name('chairs.update');
                Route::delete('/{chair}/delete',  [ChairController::class, 'destroy'])->name('chairs.destroy');
                Route::get('/search', [ChairController::class,'search'])->name('chairs.search');

            });

            Route::group(['prefix' => 'eventplaces'], function() {
                Route::get('/', [Event_placeController::class, 'index'])->name('eventplaces.index');
                Route::get('/create',  [Event_placeController::class, 'create'])->name('eventplaces.create');
                Route::post('/create',  [Event_placeController::class, 'store'])->name('eventplaces.store');
                Route::get('/{eventplace}/show',  [Event_placeController::class, 'show'])->name('eventplaces.show');
                Route::get('/{eventplace}/edit',  [Event_placeController::class, 'edit'])->name('eventplaces.edit');
                Route::patch('/{eventplace}/update',  [Event_placeController::class, 'update'])->name('eventplaces.update');
                Route::delete('/{eventplace}/delete',  [Event_placeController::class, 'destroy'])->name('eventplaces.destroy');
            });

            Route::group(['prefix' => 'events'], function() {
                Route::get('/', [EventController::class, 'index'])->name('events.index');
                Route::get('/create',  [EventController::class, 'create'])->name('events.create');
                Route::post('/create',  [EventController::class, 'store'])->name('events.store');
                Route::get('/{event}/show',  [EventController::class, 'show'])->name('events.show');
                Route::get('/{event}/edit',  [EventController::class, 'edit'])->name('events.edit');
                Route::patch('/{event}/update',  [EventController::class, 'update'])->name('events.update');
                Route::delete('/{event}/delete',  [EventController::class, 'destroy'])->name('events.destroy');
                Route::get('/inreg/{event}',  [EventController::class, 'inreg'])->name('events.inreg');
                Route::get('/outreg/{event}',  [EventController::class, 'outreg'])->name('events.outreg');

            });

            Route::group(['prefix' => 'invitations'], function() {
                Route::get('/', [InvitationsController::class, 'index'])->name('invitations.index');
                Route::get('/publicinvitations', [InvitationsController::class, 'publicinvitations'])->name('invitations.publicinvitations');
                Route::get('/outregpage/{event}', [InvitationsController::class, 'outregpage'])->name('invitations.outregpage');
                Route::get('/create',  [InvitationsController::class, 'create'])->name('invitations.create');
                Route::post('/create',  [InvitationsController::class, 'store'])->name('invitations.store');
                Route::post('/{event}/storeout',  [InvitationsController::class, 'storeout'])->name('invitations.storeout');
                Route::get('/{invitation}/show',  [InvitationsController::class, 'show'])->name('invitations.show');
                Route::get('/{invitation}/edit',  [InvitationsController::class, 'edit'])->name('invitations.edit');
                Route::patch('/{invitation}/update',  [InvitationsController::class, 'update'])->name('invitations.update');
                Route::delete('/{invitation}/delete',  [InvitationsController::class, 'destroy'])->name('invitations.destroy');
            });


        });

});
