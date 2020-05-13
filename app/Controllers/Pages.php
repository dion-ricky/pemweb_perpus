<?php namespace App\Controllers;

class Pages extends BaseController {

    public function view($page = 'home') {
        $forbid_authenticated_user = [
            'login',
            'register'
        ];

        if (in_array($page, $forbid_authenticated_user)) {
            if ($this->session->get("sub") !== null) {
                return Auth::redirector('/home');
            }
        }
        
        if ( ! is_file(APPPATH.'/Views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        $data = [
            'sub' => $this->session->get('sub')
        ];

        echo view('pages/'.$page, $data);
    }
}