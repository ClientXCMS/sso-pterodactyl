<?php

use Illuminate\Support\Facades\Route;
use ClientXCMS\Sso\Http\Controllers\SsoController;

Route::middleware(['web'])->group(function () {
    Route::get('/sso-clientxcms', [SsoController::class, 'webhook']);
    Route::get('/sso-clientxcms/{token}', [SsoController::class, 'handle'])->name('sso-clientxcms.login');
});
