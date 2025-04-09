<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QualityProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

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



// 🏠 Pagina principală
Route::get('/', function () {
    return view('home');
});

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/register', [AuthController::class, 'register'])->name('register');


// 🔐 Dashboard protejat pentru utilizatori autentificați
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['role:admin'])->group(function () {

    Route::post('/createUserFromAdmin', [AdminController::class, 'createUserFromAdmin'])->name("createUserFromAdmin");
    Route::get('/specialRegister', [AuthController::class, 'specialRegister']);
});

Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/servicii', [App\Http\Controllers\ServicesController::class, 'services'])->name('services');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'contact'])->name('contact');
Route::get('/machiaj-profesional', [App\Http\Controllers\MakeupController::class, 'aboutMakeup'])->name('aboutMakeup');
Route::get('/programare', [AppointmentController::class, 'index'])->name('apointment');
Route::post('/programare', [AppointmentController::class, 'createApointment'])->name('appointment');
Route::post('/setare-programare', [AppointmentController::class, 'setAppointment'])->name('appointment.set');
Route::post('/finalizare-programare', [AppointmentController::class, 'finishAppointment'])->name('appointment.finish');
Route::post('/stergere-programare', [AppointmentController::class, 'removeAppointment'])->name('appointment.delete');
Route::get('/programari_machiaj_zi', [AppointmentController::class, 'dayMakeup'])->name('dayMakeup');
Route::get('/programari_machiaj_seara', [AppointmentController::class, 'nightMakeup'])->name('nightMakeup');
Route::get('/programari_machiaj_eveniment', [AppointmentController::class, 'eventMakeup'])->name('eventMakeup');
Route::get('/programari_extensi_gene', [AppointmentController::class, 'eyelashExtensions'])->name('eyelashExtensions');
Route::get('/programari_laminare_sprancene', [AppointmentController::class, 'eyebrowLamination'])->name('eyebrowLamination');
Route::get('/programari_micropigmentare_buze', [AppointmentController::class, 'lipMicropigmentation'])->name('lipMicropigmentation');
Route::get('/programari_pensat_laminat_vopsit', [AppointmentController::class, 'eyebrowShapingLaminationTinting'])->name('eyebrowShapingLaminationTinting');
Route::get('/despre-noi', [AboutUsController::class, 'index'])->name('aboutUs');
Route::get('/produse-calitate', [QualityProductsController::class, 'index'])->name('qualityProducts');

Route::get('lang/{lang}', function ($lang) {
    // Verifică dacă limba aleasă este validă
    if (in_array($lang, ['ro', 'en'])) {
        // Salvează limba în sesiune
        session(['locale' => $lang]);
    }
    return redirect()->back();
})->name('lang.switch');

//errors
Route::get('/access-denied', [App\Http\Controllers\ErrorController::class, 'accessDenied'])->name('access.denied');
