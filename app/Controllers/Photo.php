<?php namespace App\Controllers;

class Photo extends BaseController {

    public function profile() {
        $placeholder_path = "./assets/images/avatar_placeholder/avatar.png";
        
        $file_handle = new \CodeIgniter\Files\File($placeholder_path);
        $file = $file_handle->openFile('r');
        $avatar = $file->fread($file->getSize());

        if ($this->session->get("sub") !== null) {
            $email      = $this->session->get('sub')['email'];
            $userModel  = new \App\Models\UserModel();
            $user       = $userModel->where('email', $email)->first();
            
            if ($user['foto'] != null) {
                $avatar = $user['foto'];
            }

        }
        
        if ( $this->is_jpeg($avatar) ) {
            $this->response->setHeader('Content-Type', 'image/jpeg');
        } else if ( $this->is_png($avatar) ) {
            $this->response->setHeader('Content-Type', 'image/png');
        }
        
        return $this->response->setStatusCode(200)->setBody($avatar);
    }

    private function is_jpeg(&$pict)
    {
      return (bin2hex($pict[0]) == 'ff' && bin2hex($pict[1]) == 'd8');
    }
  
    private function is_png(&$pict)
    {
      return (bin2hex($pict[0]) == '89' && $pict[1] == 'P' && $pict[2] == 'N' && $pict[3] == 'G');
    }
}