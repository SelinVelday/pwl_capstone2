<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // <-- Ditambahkan untuk kejelasan
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\CommitteeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sinilah Anda dapat mendaftarkan rute web untuk aplikasi Anda.
| Rute-rute ini dimuat oleh RouteServiceProvider dan semuanya akan
| ditugaskan ke grup middleware "web".
|
*/

// ======================================================================
// RUTE PUBLIK (Dapat diakses oleh semua orang, termasuk Guest)
// ======================================================================
Route::get('/', [EventController::class, 'index'])->name('home');
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');


// ======================================================================
// RUTE UMUM UNTUK PENGGUNA TEROTENTIKASI
// ======================================================================
Route::middleware('auth')->group(function () {
    // Dashboard standar dari Breeze
    Route::get('/dashboard', function () {
        // Logika redirect berdasarkan peran bisa ditambahkan di sini jika diperlukan
        // Namun, controller login sudah menanganinya. Ini bisa jadi fallback.
        $role = Auth::user()->role;
        
        // PERUBAHAN: Mengarahkan admin ke dashboard baru
        if ($role == 'admin') return redirect()->route('admin.dashboard');

        if ($role == 'finance') return redirect()->route('finance.payments.pending');
        if ($role == 'committee') return redirect()->route('committee.events.index');
        return redirect()->route('events.index');
    })->name('dashboard');

    // Manajemen profil pengguna
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// ======================================================================
// RUTE KHUSUS MEMBER
// ======================================================================
Route::middleware(['auth', \App\Http\Middleware\RoleMiddleware::class . ':member'])->prefix('member')->name('member.')->group(function () {
    Route::get('/my-registrations', [MemberController::class, 'myRegistrations'])->name('my_registrations');
    Route::post('/events/{event}/register', [MemberController::class, 'registerEvent'])->name('events.register');
    Route::patch('/registrations/{registration}/upload-payment', [MemberController::class, 'uploadPaymentProof'])->name('payment.upload');
    Route::get('/registrations/{registration}/qrcode', [MemberController::class, 'showQrCode'])->name('qrcode.show');
    Route::get('/registrations/{registration}/certificate', [MemberController::class, 'downloadCertificate'])->name('certificate.download');
    Route::get('/registrations/{registration}/select-sessions', [MemberController::class, 'selectSessionsForm'])->name('sessions.select');
    Route::post('/registrations/{registration}/store-sessions', [MemberController::class, 'storeSelectedSessions'])->name('sessions.store');
});


// ======================================================================
// RUTE KHUSUS TIM KEUANGAN (FINANCE)
// ======================================================================
Route::middleware(['auth', \App\Http\Middleware\RoleMiddleware::class . ':finance'])->prefix('finance')->name('finance.')->group(function () {
    Route::get('/pending-payments', [FinanceController::class, 'pendingPayments'])->name('payments.pending');
    Route::get('/verified-payments', [FinanceController::class, 'verifiedPayments'])->name('payments.verified');
    Route::patch('/registrations/{registration}/verify', [FinanceController::class, 'verifyPayment'])->name('payment.verify');
    Route::patch('/registrations/{registration}/reject', [FinanceController::class, 'rejectPayment'])->name('payment.reject');
});


// ======================================================================
// RUTE KHUSUS PANITIA (COMMITTEE)
// ======================================================================
Route::middleware(['auth', \App\Http\Middleware\RoleMiddleware::class . ':committee'])->prefix('committee')->name('committee.')->group(function () {
    Route::get('/events', [CommitteeController::class, 'indexEvents'])->name('events.index');
    Route::get('/events/create', [CommitteeController::class, 'createEventForm'])->name('events.create');
    Route::post('/events', [CommitteeController::class, 'storeEvent'])->name('events.store');
    Route::get('/events/{event}/edit', [CommitteeController::class, 'editEventForm'])->name('events.edit');
    Route::put('/events/{event}', [CommitteeController::class, 'updateEvent'])->name('events.update');
    Route::delete('/events/{event}', [CommitteeController::class, 'deleteEvent'])->name('events.delete');
    Route::get('/events/{event}/sub-events', [CommitteeController::class, 'indexSubEvents'])->name('events.sub_events.index');
    Route::get('/events/{event}/sub-events/create', [CommitteeController::class, 'createSubEventForm'])->name('events.sub_events.create');
    Route::post('/events/{event}/sub-events', [CommitteeController::class, 'storeSubEvent'])->name('events.sub_events.store');
    Route::get('/sub-events/{subEvent}/edit', [CommitteeController::class, 'editSubEventForm'])->name('sub_events.edit');
    Route::put('/sub-events/{subEvent}', [CommitteeController::class, 'updateSubEvent'])->name('sub_events.update');
    Route::delete('/sub-events/{subEvent}', [CommitteeController::class, 'deleteSubEvent'])->name('sub_events.delete');
    Route::get('/events/{event}/attendance-scanner', [CommitteeController::class, 'showAttendanceScanner'])->name('attendance.scanner');
    Route::post('/events/{event}/scan-attendance', [CommitteeController::class, 'scanAttendance'])->name('attendance.scan');
    Route::get('/events/{event}/session-attendance-scanner', [CommitteeController::class, 'showSessionAttendanceScanner'])->name('session.attendance.scanner');
    Route::post('/events/{event}/scan-session-attendance', [CommitteeController::class, 'scanSessionAttendance'])->name('session.attendance.scan');
    Route::get('/events/{event}/certificates', [CommitteeController::class, 'uploadCertificateForm'])->name('certificates.form');
    Route::post('/events/{event}/certificates', [CommitteeController::class, 'uploadCertificates'])->name('certificates.upload');
});


// ======================================================================
// RUTE KHUSUS ADMINISTRATOR
// ======================================================================
Route::middleware(['auth', \App\Http\Middleware\RoleMiddleware::class . ':admin'])->prefix('admin')->name('admin.')->group(function () {
    // PERUBAHAN: Menambahkan rute dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/users', [AdminController::class, 'indexUsers'])->name('users.index');
    Route::get('/users/create', [AdminController::class, 'createUserForm'])->name('users.create');
    Route::post('/users', [AdminController::class, 'storeUser'])->name('users.store');
    Route::get('/users/{user}/edit', [AdminController::class, 'editUserForm'])->name('users.edit');
    Route::put('/users/{user}', [AdminController::class, 'updateUser'])->name('users.update');
    Route::delete('/users/{user}', [AdminController::class, 'deleteUser'])->name('users.delete');
    Route::patch('/users/{user}/toggle-active', [AdminController::class, 'toggleUserActive'])->name('users.toggle');
});

// ======================================================================
// RUTE OTENTIKASI (Disediakan oleh Laravel Breeze)
// ======================================================================
require __DIR__.'/auth.php';