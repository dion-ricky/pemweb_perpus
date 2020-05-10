<?php namespace App\Controllers;

class Auth extends BaseController {

    public function login() {
        // POST only
        $this->session->set([
            'sub'   =>  'abc@gmail.com'
        ]);
    }

    public function logout() {
        // GET only

    }

    public function register() {
        // POST only
        $nomor_anggota      = $this->generateNoAnggota();
        $nama               = $this->request->getPost('nama');
        $email              = $this->request->getPost('email');
        $unhashed_password  = $this->request->getPost('password');

        $data = [
            'nomor_anggota'     => $nomor_anggota,
            'nama'              => $nama,
            'email'             => $email,
            'password'          => password_hash($unhashed_password, PASSWORD_BCRYPT)
        ];

        $userModel = new \App\Models\UserModel();
        // $userModel->insert($data);

        print_r($userModel->findAll());

        // print_r($userModel->checkError());
        // print_r($data);
        // echo $this->db->affected_rows() > 0;
    }

    private function generateNoAnggota() {
        // YmdHisRND
        $date = date("YmdHis");
        $random = mt_rand(100, 900);
        return $date . "" . $random;
    }
}