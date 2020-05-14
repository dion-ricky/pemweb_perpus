<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{	
		$bukuModel = new \App\Models\BukuModel();
		$books_result = $bukuModel->getAllWithoutCover();

		$books = $books_result->getResultArray();

		$data = [
			'sub' => $this->session->get('sub'),
			'books' => $books
		];

		return view('pages/home', $data);
	}
}
