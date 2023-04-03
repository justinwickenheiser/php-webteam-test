<?php

namespace GvsuWebTeam\Webteam\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
   public function index()
    {
        return view('webteam::cms5.test.index', [
        	'breadcrumbs' => 'test'
        ]);
    }
}
