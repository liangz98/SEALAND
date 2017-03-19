<?php

namespace App\Http\Controllers;

/**
 * Class StaticPagesController
 * @package App\Http\Controllers
 */
class StaticPagesController extends Controller {
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function home() {
		return view('static_pages/home');
	}
}
