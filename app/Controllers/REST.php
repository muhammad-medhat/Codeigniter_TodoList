<?php

namespace App\Controllers;

class REST extends BaseController
{
	public function index()
	{
		return view('rest');
	}
	public function hello(){
		return view('hello');
	}
}
