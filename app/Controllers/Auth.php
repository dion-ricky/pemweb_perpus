<?php namespace App\Controllers;

class Auth extends BaseController {

    public function login() {
        // POST only
        $email      = $this->request->getPost('email');
        $password   = $this->request->getPost('password');

        $redirect_to = $this->request->getGet('r');

        if ($this->selfLogin($email, $password)) {
            return Auth::redirector($redirect_to);
        }

        return $this->showLogin(['errors' => ['code' => '11A', 'message' => 'Email atau password salah!']]);
    }
    
    private function selfLogin($email, $password, $set_session=true) {
        $userModel = new \App\Models\UserModel();
        $user = $userModel->where('email', $email)->first();
        
        if ( !password_verify($password, $user['password']) ) {
            return false;
        }

        if ( $set_session) {
            $this->setSession($user);
        }

        return true;
    }

    private function setSession($user) {
        $this->session->set([
            'sub'   =>  [
                'nomor_anggota' => $user['nomor_anggota'],
                'nama'          => $user['nama'],
                'email'         => $user['email'],
                'status'        => $user['status'],
                'level'         => $user['level']
            ]
        ]);
    }

    public function logout() {
        // GET only
        if (!$this->isLoggedIn()) {
            return Auth::redirector('/');
        }

        $this->session->remove("sub");
        return Auth::redirector('/auth/login');
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
        $userModel->insert($data);

        if ($userModel->affectedRows() > 0) {
            return Auth::redirector('/auth/login');
        }

        // error
        return $this->showRegister(['errors' => $userModel->error()]);
    }

    private function generateNoAnggota() {
        // YmdHisRND
        $date = date("YmdHis");
        $random = mt_rand(100, 900);
        return $date . "" . $random;
    }

    private function isLoggedIn() {
        return $this->session->get("sub") !== null;
    }

    public function redirector($to) {
        $uri = new \CodeIgniter\HTTP\URI($to);

        $path = $uri->getPath();

        return redirect()->to('./'.$path);
    }

    public function showLogin($additional_data = false) {
        $data = [
            'sub' => $this->session->get('sub'),
        ];

        if ($additional_data) {
            $data = array_merge($additional_data, $data);
        }

        return view('pages/login', $data);
    }

    public function showRegister($additional_data = false) {
        $data = [
            'sub' => $this->session->get('sub')
        ];

        if ($additional_data) {
            $data = array_merge($additional_data, $data);
        }

        return view('pages/register', $data);
    }
}