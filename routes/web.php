<?php

namespace GvsuWebTeam\Webteam;

use Illuminate\Support\Facades\Route;
use GvsuWebTeam\Webteam\Http\Controllers\AdminController;

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'cms5/webteam/custom'], function() {
	Route::get('/', [AdminController::class, 'index'])->name('hotels.admin.index');
});
