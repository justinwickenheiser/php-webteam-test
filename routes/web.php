<?php

namespace GvsuWebTeam\Webteam;

use Illuminate\Support\Facades\Route;
use GvsuWebTeam\Cms\Facades\CMS;
// use GvsuWebTeam\Cms\Facades\Content;

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'cms5/webteam/custom'], function() {
	Route::get('/', [AdminController::class, 'index'])->name('webteam.custom.test.index');
});

Route::group(['middleware' => ['web'], 'prefix' => 'webteam'], function() {
	Route::get('/policies', function() {
		
		// Set my page overrides
		CMS::page([
			'title' => 'Webteam Policies',
			'header_type' => 'none',
			'my_custom_var' => 'foobar'
		]);

		// Set my site overrides
		CMS::site([
			'show_content_title' => false
		]);

		return view('webteam::policies');
	})->name('webteam.policies');
});
