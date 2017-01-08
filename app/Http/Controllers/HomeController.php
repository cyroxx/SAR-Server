<?php

namespace App\Http\Controllers;

use DB;

class HomeController extends Controller {

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('pages.home');
	}

}