<?php

use App\Http\Controllers\TranslationController;
use Illuminate\Support\Facades\Route;


Route::get('/', [TranslationController::class, 'index'])->name('translations.index');
Route::prefix('translation')->group(function () {
    Route::get('/create', [TranslationController::class, 'create'])->name('translations.create');
    Route::post('/store', [TranslationController::class, 'store'])->name('translations.store');
    Route::get('/{id}/edit', [TranslationController::class, 'edit'])->name('translations.edit');
    Route::put('/{id}/update', [TranslationController::class, 'update'])->name('translations.update');
    Route::delete('/{id}/delete', [TranslationController::class, 'destroy'])->name('translations.destroy');
});
