<?php namespace App\Controllers;

class Buku extends BaseController {

    public function baru($additional_data=false) {
        if ($this->session->get('sub') == null || $this->session->get('sub')['level'] != 1) {
            return Auth::redirector("/");
        }
        
        $data = [
            'sub' => $this->session->get('sub')
        ];

        if ($additional_data) {
            $data = array_merge($additional_data, $data);
        }

        return view('pages/buku/baru', $data);
    }

    public function tambahBuku() {
        $isbn           = $this->request->getPost('isbn');
        $judul          = $this->request->getPost('judul');
        $tahun_terbit   = $this->request->getPost('tahun_terbit');
        $penulis        = $this->request->getPost('penulis');
        $penerbit       = $this->request->getPost('penerbit');
        $sinopsis       = $this->request->getPost('sinopsis');
        $cetakan        = $this->request->getPost('cetakan');
        
        $data = [
            'isbn'          => $isbn,
            'judul'         => $judul,
            'tahun_terbit'  => $tahun_terbit,
            'penulis'       => $penulis,
            'penerbit'      => $penerbit,
            'sinopsis'      => $sinopsis,
            'cetakan'       => $cetakan
        ];
        
        $files = $this->request->getFiles();
        
        $cover_file = $this->request->getFile('cover');
        
        if ($cover_file->isValid()) {
            $cover_path = $cover_file->getTempName();
            
            $file_handler = new \CodeIgniter\Files\File($cover_path);
            $file = $file_handler->openFile('r');
            $cover = $file->fread($file->getSize());
            
            $data['cover'] = $cover;
        }
        
        $bukuModel = new \App\Models\BukuModel();
        $bukuModel->insert($data);

        if ($bukuModel->affectedRows() > 0) {
            return $this->baru(['success' => ['message' => 'Berhasil menambahkan buku!']]);
        }

        // error
        return $this->baru(['errors' => $bukuModel->checkError()]);
    }

    public function edit($id_buku, $additional_data=false) {
        if ($this->session->get('sub') == null || $this->session->get('sub')['level'] != 1) {
            return Auth::redirector("/buku/$id_buku");
        }
        
        $bukuModel = new \App\Models\BukuModel();
        $buku = $bukuModel->find($id_buku);

        if ($buku === null) return Auth::redirector('/');

        $data = [
            'sub' => $this->session->get('sub'),
            'buku' => $buku
        ];

        if ($additional_data) {
            $data = array_merge($additional_data, $data);
        }

        return view('pages/buku/edit', $data);
    }

    public function editBuku($id_buku) {
        $isbn           = $this->request->getPost('isbn');
        $judul          = $this->request->getPost('judul');
        $tahun_terbit   = $this->request->getPost('tahun_terbit');
        $penulis        = $this->request->getPost('penulis');
        $penerbit       = $this->request->getPost('penerbit');
        $sinopsis       = $this->request->getPost('sinopsis');
        $cetakan        = $this->request->getPost('cetakan');
        
        $data = [
            'isbn'          => $isbn,
            'judul'         => $judul,
            'tahun_terbit'  => $tahun_terbit,
            'penulis'       => $penulis,
            'penerbit'      => $penerbit,
            'sinopsis'      => $sinopsis,
            'cetakan'       => $cetakan
        ];
        
        $files = $this->request->getFiles();
        
        $cover_file = $this->request->getFile('cover');
        
        if ($cover_file->isValid()) {
            $cover_path = $cover_file->getTempName();
            
            $file_handler = new \CodeIgniter\Files\File($cover_path);
            $file = $file_handler->openFile('r');
            $cover = $file->fread($file->getSize());
            
            $data['cover'] = $cover;
        }
        
        $bukuModel = new \App\Models\BukuModel();
        $bukuModel->update($id_buku, $data);

        if ($bukuModel->affectedRows() > 0) {
            return $this->edit($id_buku, ['success' => ['message' => 'Berhasil mengubah data buku!']]);
        }

        // error
        return $this->edit($id_buku, ['errors' => $bukuModel->checkError()]);
    }

    public function detail($id_buku) {
        $bukuModel = new \App\Models\BukuModel();
        $buku = $bukuModel->find($id_buku);

        if ($buku == null) {
            return Auth::redirector('/');
        }

        $data = [
            'sub' => $this->session->get('sub'),
            'buku' => $buku
        ];

        return view('pages/buku/detail', $data);
    }

    public function pinjam($id_buku, $additional_data=false) {
        if ($this->session->get('sub') == null) {
            return Auth::redirector('/auth/login');
        }

        $bukuModel = new \App\Models\BukuModel();
        $buku = $bukuModel->find($id_buku);

        if ($buku['status'] != 0) {
            return Auth::redirector("/buku/$id_buku");
        }

        $data = [
            'sub' => $this->session->get('sub'),
            'buku' => $buku
        ];

        if ($additional_data) {
            $data = array_merge($additional_data, $data);
        }

        return view('pages/buku/pinjam', $data);
    }

    public function pinjamBuku($id_buku) {
        if ($this->session->get('sub') == null) {
            return Auth::redirector('/auth/login');
        }

        $tanggal = $this->request->getPost('peminjaman_date');
        
        $session_user = $this->session->get('sub');

        $userModel = new \App\Models\UserModel();
        $user = $userModel->where('email', $session_user['email'])->first();

        $data = [
            'jenis' => 0,
            'tanggal' => $tanggal,
            'id_user' => $user['id_user'],
            'id_buku' => $id_buku
        ];

        $transaksiModel = new \App\Models\TransaksiModel();
        $transaksiModel->insert($data);

        $bukuModel = new \App\Models\BukuModel();

        $data_buku = [
            'status' => 1
        ];

        $bukuModel->update($id_buku, $data_buku);

        if ($transaksiModel->affectedRows() > 0 && $bukuModel->affectedRows() > 0) {
            return $this->pinjam($id_buku, ['success' => ['message' => 'Berhasil meminjam buku']]);
        }
        // error
        else if ($bukuModel->affectedRows() > 0) {
            return $this->pinjam($id_buku, ['errors' => $transaksiModel->checkError()]);
        } else {
            return $this->pinjam($id_buku, ['errors' => $bukuModel->checkError()]);
        }
    }

    public function kembali($additional_data) {
        if ($this->session->get('sub') == null || $this->session->get('sub')['level'] != 1) {
            return Auth::redirector("/");
        }

        $email = $this->request->getGet('email');
        $list_buku_dipinjam = null;

        if ($email != null) {
            $transaksiModel = new \App\Models\TransaksiModel();
            
            $list_buku_dipinjam = $transaksiModel->getAllBooksNotReturned($email)->getResultArray();

            foreach ($list_buku_dipinjam as &$buku_dipinjam) {
                $trx = $transaksiModel->getTrxPeminjamanTerbaru($email, $buku_dipinjam['id_buku'])->getResultArray();

                $buku_dipinjam['id_transaksi'] = $trx[0]['id_transaksi'];
            }
        }
        
        $data = [
            'sub' => $this->session->get('sub'),
            'list_buku' => $list_buku_dipinjam,
            'email' => $email,
            $additional_data
        ];

        return view('pages/buku/kembali', $data);
    }

    public function kembaliConfirm($id_transaksi) {
        if ($this->session->get('sub') == null || $this->session->get('sub')['level'] != 1) {
            return Auth::redirector("/");
        }

        $transaksiModel = new \App\Models\TransaksiModel();
        $transaksi = $transaksiModel->getDetailTransaksi($id_transaksi)->getResultArray()[0];

        $data = [
            'sub' => $this->session->get('sub'),
            'transaksi' => $transaksi
        ];

        return view('pages/buku/kembali_confirm', $data);
    }

    public function kembaliBuku($id_transaksi) {
        $transaksiModel = new \App\Models\TransaksiModel();
        $transaksi = $transaksiModel->getDetailTransaksi($id_transaksi)->getResultArray()[0];

        $tanggal = $this->request->getPost('pengembalian_date');

        $data = [
            'jenis' => 1,
            'tanggal' => $tanggal,
            'id_user' => $transaksi['id_user'],
            'id_buku' => $transaksi['id_buku']
        ];

        $transaksiModel->insert($data);

        if ($transaksiModel->affectedRows() > 0) {
            $bukuModel = new \App\Models\BukuModel();

            $data_buku = [
                'status' => 0
            ];
            
            $bukuModel->update($transaksi['id_buku'], $data_buku);
            
            return Auth::redirector('/');
        }

        // error
        // return view('pages/buku/kembali', ['errors' => $transaksiModel->error()]);
    }

    public function coverBuku($id_buku) {
        $placeholder_path = "./assets/images/cover_placeholder/nocover.jpg";
        
        $bukuModel  = new \App\Models\BukuModel();
        $buku       = $bukuModel->find($id_buku);
        
        if ($buku['cover'] === null) {
            $file_handle = new \CodeIgniter\Files\File($placeholder_path);
            $file = $file_handle->openFile('r');
            $cover = $file->fread($file->getSize());
        } 
        else {
            $cover = $buku['cover'];
        }

        if ($cover === null) return $this->response->setStatusCode(500);

        if ( $this->is_jpeg($cover) ) {
            $this->response->setHeader('Content-Type', 'image/jpeg');
        } else if ( $this->is_png($cover) ) {
            $this->response->setHeader('Content-Type', 'image/png');
        }
        
        return $this->response->setStatusCode(200)->setBody($cover);
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