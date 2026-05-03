<?php

use App\Http\Controllers\TranslationController;
use Illuminate\Support\Facades\Route;


Route::get('/', [TranslationController::class, 'index'])->name('translations.index');
Route::prefix('translation')->group(function () {
    Route::post('/store', [TranslationController::class, 'store'])->name('translations.store');
    Route::put('/{id}/update', [TranslationController::class, 'update'])->name('translations.update');
    Route::delete('/{id}/delete', [TranslationController::class, 'destroy'])->name('translations.destroy');
});
