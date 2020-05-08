<?php namespace App\Controllers;

class Test extends BaseController
{
    public function test($nama) {
        $this->response->send($nama);
    }
}