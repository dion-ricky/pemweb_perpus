<?php namespace App\Controllers;

class User extends BaseController {

    public function profile($additional_data = false) {
        if ($this->session->get('sub') === null) {
            return Auth::redirector('/home');
        }

        $data = [
            'sub' => $this->session->get('sub')
        ];

        if ($additional_data) {
            $data['data'] = $additional_data;
        }

        return view('pages/user/profile', $data);
    }

    public function updateGeneral() {
        $userModel = new \App\Models\UserModel();
        
        $nama   = $this->request->getPost('nama');
        $email  = $this->request->getPost('email');
        $current_email = $this->session->get('sub')['email'];

        $user = $userModel->where('email', $current_email)->first();
        $id_user = $user['id_user'];

        $data = [
            'id_user' => $id_user,
            'nama' => $nama,
            'email' => $email
        ];
        
        $files = $this->request->getFiles();
        
        $foto_file = $this->request->getFile('foto');

        if ($foto_file->isValid()) {
            $foto_path = $foto_file->getTempName();
            
            $file_handler = new \CodeIgniter\Files\File($foto_path);
            $file = $file_handler->openFile('r');
            $foto = $file->fread($file->getSize());

            $data['foto'] = $foto;
        }

        $userModel->save($data);
        $this->refreshSessionData($data);
        return $this->profile(['errors' => $userModel->errors(), 'db-errors' => $userModel->checkError()]);
    }

    public function changePass($additional_data=false) {
        if ($this->session->get('sub') === null) {
            return Auth::redirector('/home');
        }

        $data = [
            'sub' => $this->session->get('sub')
        ];

        if ($additional_data) {
            $data['data'] = $additional_data;
        }

        return view('pages/user/change_pass', $data);
    }

    public function updatePassword() {
        $current_pass   = $this->request->getPost('current-password');
        $pass           = $this->request->getPost('password');
        $confirm_pass   = $this->request->getPost('confirm-password');
        $email          = $this->session->get('sub')['email'];

        if ($password !== $confirm_pass) {
            return Auth::redirector('/user/profile/changepass');
        }

        $userModel = new \App\Models\UserModel();
        $user = $userModel->where('email', $email)->first();

        if (password_verify($current_pass, $user['password'])) {
            $data = [
                'id_user' => $user['id_user'],
                'password' => password_hash($pass, PASSWORD_BCRYPT)
            ];

            $userModel->save($data);
        } else {
            return $this->changePass(['errors' => 'Wrong password!']);
        }

        return Auth::redirector('/auth/logout');
    }

    public function refreshSessionData($user) {
        $session_data = $this->session->get();

        $session_data['sub']['nama'] = $user['nama'];
        $session_data['sub']['email'] = $user['email'];

        $this->session->set($session_data);
    }
}