<?php

use App\Http\Controllers\Admin\AreaController as AdminAreaController;
use App\Http\Controllers\Admin\BreedController as AdminBreedController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\SanitaryController as AdminSanitaryController;
use App\Http\Controllers\Admin\StatusController as AdminStatusController;
use App\Http\Controllers\Admin\TypeController as AdminTypeController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\UserPermissionController as AdminUserPermissionController;
use App\Http\Controllers\Admin\PlaceController as AdminPlaceController;
use App\Http\Controllers\Mayor\DashboardController as MayorDashboardController;
use App\Http\Controllers\Admin\SanitaryTypeController as AdminSanitaryTypeController;
use App\Http\Controllers\Admin\MarkerController as AdminMarkerController;
use App\Http\Controllers\Admin\BackupController as AdminBackupController;
use App\Http\Controllers\Admin\ReportController as AdminReportController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Moder\DashboardController as ModerDashboardController;
use App\Http\Controllers\Moder\MarkerController as ModerMarkerController;
use App\Http\Controllers\Moder\TreeController as ModerTreeController;
use App\Http\Controllers\Moder\BreedController as ModerBreedController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class,"index"]);
Route::get('/map', [HomeController::class,"map"])->name("front-map");
Route::get('/statistics', [HomeController::class,"stats"])->name("stats");
Route::get('/faq', [HomeController::class,"faq"])->name("faq");
Route::get('/contact', [HomeController::class,"contact"])->name("contact");
Route::get('/do-backup', [HomeController::class,"db_dump"])->name("do-backup");
Route::get('/make-report/{id}', [HomeController::class,"make_report"])->name("make-report");
Route::post('/save-report', [HomeController::class,"save_report"])->name("save-report");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::middleware('AdminMiddleware')->prefix('admin')->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('admin-dashboard');
        Route::get('converts', [AdminDashboardController::class, 'convert'])->name('admin-convert');
        Route::get('maps', [AdminDashboardController::class, 'map'])->name('admin-maps');
        Route::resource('area', AdminAreaController::class);
        Route::resource('user', AdminUserController::class);
        Route::get("/user-permission/{id}",[AdminUserPermissionController::class,"getUserPermission"])->name("get-user-permission");
        Route::post("/give-user-permission",[AdminUserPermissionController::class,"giveUserPermission"])->name("give-user-permission");
        Route::get("/delete-user-permission/{id}/{user_id}",[AdminUserPermissionController::class,"deleteUserPermission"])->name("delete-user-permission");
        Route::resource('place', AdminPlaceController::class)->except('show');
        Route::any('place/search', [AdminPlaceController::class, 'search'])->name('place.search');
        Route::resource('breed', AdminBreedController::class);
        Route::resource('category', AdminCategoryController::class);
        Route::resource('sanitary', AdminSanitaryController::class);
        Route::resource('status', AdminStatusController::class);
        Route::resource('event', AdminEventController::class);
        Route::resource('type', AdminTypeController::class);
        Route::resource('sanitary_type', AdminSanitaryTypeController::class);
        Route::get("all-trees",[AdminDashboardController::class,"all_trees"])->name("all-trees");
        Route::get('add-place/{id?}', [AdminPlaceController::class, 'addPlace'])->name('admin.add-place');
        Route::get("/change-marker/{id}",[AdminPlaceController::class,"changeMarker"])->name("change-marker");
        Route::put("/update-marker/{id}",[AdminPlaceController::class,"updateMarker"])->name("update-marker");
        Route::get("/delete-markers-by-place/{id}",[AdminPlaceController::class,"deleteByPlace"])->name("delete-markers-by-place-id");
        Route::put("/delete-markers-by-place-stats/{id}",[AdminPlaceController::class,"deleteByPlaceStats"])->name("delete-markers-by-place-stats");
        Route::get('users-check', [AdminDashboardController::class, 'geo_positions'])->name('admin-check-users');
        Route::get('user-by-geo/{id}', [AdminDashboardController::class, 'getByGeo'])->name('admin-user-by-geo');
        Route::get('user-stats/{id}', [AdminUserController::class, 'stats'])->name('user-stats');
        Route::get("markers",[AdminMarkerController::class,"index"])->name("markers");
        Route::get("markers-edit",[AdminMarkerController::class,"edit"])->name("markers-edit");
        Route::put("markers-mass-update",[AdminMarkerController::class,"update"])->name("markers-mass-update");
        Route::get("back-up",[AdminBackupController::class,"index"])->name("back-up");
        Route::delete("back-up-destroy",[AdminBackupController::class,"delete"])->name("back-up-destroy");
        Route::resource('reports', AdminReportController::class)->only([
            'index', 'edit','destroy',"update"
        ]);
    });

    Route::middleware('ModerMiddleware')->prefix('moder')->group(function () {
        Route::get('/', [ModerDashboardController::class, 'index'])->name('moder-dashboard');
        Route::get('/maps', [ModerDashboardController::class, 'maps'])->name('moder-maps');
        Route::get('/places', [ModerDashboardController::class, 'places'])->name('moder-places');
        Route::get('/markers/by-area/{area_id}', [ModerMarkerController::class, 'index'])->name('moder-markers');
        Route::post('store-marker', [ModerMarkerController::class, 'store'])->name('store-marker');
        Route::resource('trees', ModerTreeController::class);
        Route::resource('moder-breed', ModerBreedController::class);
    });

    Route::middleware('MayorMiddleware')->prefix('mayor')->group(function (){
        Route::get('', [MayorDashboardController::class, 'index'])->name('mayor-dashboard');
        Route::get('statistics', [MayorDashboardController::class, 'statistics'])->name('mayor-statistics');
        Route::get('search', [MayorDashboardController::class, 'search'])->name('mayor-search');
        Route::post('search', [MayorDashboardController::class, 'search'])->name('mayor-search');
        Route::get('mayor-marker-show/{id}', [MayorDashboardController::class, 'marker_edit'])->name('mayor-marker-show');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
