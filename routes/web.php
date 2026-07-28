<?php

use Illuminate\Support\Facades\Route;

// ─── Admin Auth (no public registration) ────────────────────────────────
Route::middleware('guest')->group(function () {
    Route::get('/login', [App\Http\Controllers\Web\AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [App\Http\Controllers\Web\AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [App\Http\Controllers\Web\AuthController::class, 'logout'])->name('logout');

    // 3-Tier Admin Portal Selector
    Route::get('/portal', [App\Http\Controllers\Web\AdminPortalController::class, 'selector'])->name('admin.portal');

    // National Government Admin
    Route::get('/admin/national', [App\Http\Controllers\Web\AdminPortalController::class, 'national'])->name('admin.national');

    // County Admin
    Route::get('/admin/county', [App\Http\Controllers\Web\AdminPortalController::class, 'county'])->name('admin.county');
    Route::get('/dashboard/county', [App\Http\Controllers\Web\DashboardV2Controller::class, 'county'])->name('dashboard.county');

    // KICC Admin Dashboard (legacy)
    Route::get('/dashboard/admin', [App\Http\Controllers\Web\AdminDashboardController::class, 'index'])->name('dashboard.admin');
    Route::post('/dashboard/admin/delete-product/{id}', [App\Http\Controllers\Web\AdminDashboardController::class, 'deleteProduct'])->name('admin.delete-product');
    Route::post('/dashboard/admin/delete-user/{id}', [App\Http\Controllers\Web\AdminDashboardController::class, 'deleteUser'])->name('admin.delete-user');
    Route::post('/dashboard/admin/delete-order/{id}', [App\Http\Controllers\Web\AdminDashboardController::class, 'deleteOrder'])->name('admin.delete-order');

    // KICC Super Admin
    Route::get('/kicc-admin', [App\Http\Controllers\Web\KiccAdminController::class, 'index'])->name('kicc.admin');
    Route::post('/kicc-admin/escrow/{id}/release', [App\Http\Controllers\Web\KiccAdminController::class, 'releaseEscrow'])->name('kicc.escrow.release');
    Route::post('/kicc-admin/approve/{table}/{id}', [App\Http\Controllers\Web\KiccAdminController::class, 'approve'])->name('kicc.approve');

    // National Admin
    Route::get('/national-admin', [App\Http\Controllers\Web\NationalPortalController::class, 'index'])->name('national.admin');

    // County Admin (professional)
    Route::get('/county-admin', [App\Http\Controllers\Web\CountyPortalController::class, 'index'])->name('county.admin');
    Route::get('/county-admin/{slug}/pro', [App\Http\Controllers\Web\CountyAdminController::class, 'proDashboard'])->name('county.admin.pro');
    Route::post('/county-admin/{slug}/content', [App\Http\Controllers\Web\CountyAdminController::class, 'updateContent'])->name('county.admin.content');
    Route::post('/county-admin/{slug}/image', [App\Http\Controllers\Web\CountyAdminController::class, 'uploadImage'])->name('county.admin.image');
    Route::post('/county-admin/{slug}/price', [App\Http\Controllers\Web\CountyAdminController::class, 'updatePrice'])->name('county.admin.price');
    Route::post('/county-admin/{slug}/sector', [App\Http\Controllers\Web\CountyAdminController::class, 'updateSector'])->name('county.admin.sector');
    Route::post('/county-admin/{slug}/entity', [App\Http\Controllers\Web\CountyAdminController::class, 'updateEntity'])->name('county.admin.entity');
});

// Filament panel routes are auto-registered by AdminPanelProvider