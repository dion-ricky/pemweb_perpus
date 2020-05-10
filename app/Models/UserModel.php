<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
    protected $table      = 'user';
    protected $primaryKey = 'id_user';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nomor_anggota', 'nama', 'email', 'password','tanggal_keanggotaan','foto','status','level'];

    protected $useTimestamps = false;

    public function checkError() {
        return $this->db->error();
    }
}