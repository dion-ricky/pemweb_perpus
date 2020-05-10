<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}

	//--------------------------------------------------------------------
	public function coba() {
        return view('carousel');
	}
	
	public function test() {
		$userModel = new \App\Models\UserModel();

		print_r($userModel->findAll());

		// print_r( $userModel->getAll()->getResult() );

	}
}
