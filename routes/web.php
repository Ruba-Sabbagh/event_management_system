<?php


use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;














/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ] // يحتف باللغة عند تسكير الموقع
    ], function(){
Route::get('/', function () {
    return view('home');
})->name('home');

    });
//Route::get('/dashboard', [UserController::class,'dashboard'])->name('dashboard');

require __DIR__.'/auth.php';


/*Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ] // يحتف باللغة عند تسكير الموقع
    ], function(){

        //Auth::routes();
        Route::middleware(['auth','role:MG'])->group(function () {


            Route::get('/admin/dashboard', [AdminController::class,'index'])->name('admin.dashboard');


            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

            Route::controller(ProgramController::class)->group(function () {
                Route::get('/all-programs', 'index')->name('allprograms');
                Route::post('/add-programs', 'store')->name('addprograms'); // لما يكون في فورم للتخزين
                Route::post('/edit-programs', 'update')->name('editprograms');
                Route::post('/delete-programs', 'delete')->name('deleteprograms');

            });


        });

        Route::middleware('auth')->group(function () {

            Route::get('/emp/dashboard', [EmployeeController::class,'index'])->name('emp.dashboard');

            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        });
});
*/

/*Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/
