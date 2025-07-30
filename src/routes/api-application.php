<?php

use Illuminate\Support\Facades\Route;
use ClientXCMS\Sso\Http\Controllers\AllocationController;

Route::middleware(['api', 'throttle:api.application'])->prefix('api/application')->name('api.applications.allocations.update')->group(function () {
    Route::patch('/allocations/{allocation}/ip-alias', [AllocationController::class, 'updateAliasIp']);
});
