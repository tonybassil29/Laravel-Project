    <?php

    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\DB;
    use App\Http\Controllers\LoginActivityController;
    use App\Http\Controllers\LoginLogsController;

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





    Route::get('/show-database', function () {
        $loginActivities = DB::table('user_login_activities')->get();
        return view('show_database', compact('loginActivities'));
    })->name('show_database');




      

Route::get('show-details/{accountId}', [LoginActivityController::class, 'showDetails'])->name('show.details');

// routes/web.php




Route::get('login-logs/{id_user}',  [LoginLogsController::class, 'index'])->name('login_logs');
Route::get('login-activities/filter', [LoginActivityController::class, 'filter'])->name('filter_login_activities');

Route::get('login-activities/filter', [LoginActivityController::class, ' showUsersInAccount'])->name('filter_login_activities');
