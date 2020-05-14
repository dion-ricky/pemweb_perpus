<?php namespace App\Controllers;

class Search extends BaseController {

    public function search() {
        $bukuModel = new \App\Models\BukuModel();

        $query = $this->request->getGet('q');

        $books = $bukuModel->searchBuku($query)->getResultArray();

        $data = [
            'sub' => $this->session->get('sub'),
            'books' => $books
        ];

        return view('pages/search', $data);
    }

}