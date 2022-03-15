<?php
use App\Http\Controllers\Auth\AdminNewPasswordController;
use App\Http\Controllers\Auth\AdminPasswordResetLinkController;
use Illuminate\Support\Facades\Route;


Route::get('admin/forgot-password', [AdminPasswordResetLinkController::class, 'create'])
                ->middleware('guest:admin')
                ->name('admin.password.request');

Route::post('admin/forgot-password', [AdminPasswordResetLinkController::class, 'store'])
                ->middleware('guest:admin')
                ->name('admin.password.email');

Route::get('admin/reset-password/{token}', [AdminNewPasswordController::class, 'create'])
                ->middleware('guest:admin')
                ->name('admin.password.reset');

Route::post('admin/reset-password', [AdminNewPasswordController::class, 'store'])
                ->middleware('guest:admin')
                ->name('admin.password.update');