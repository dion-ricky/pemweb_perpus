<?php namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model {
    protected $table      = 'buku';
    protected $primaryKey = 'id_buku';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['isbn', 'judul', 'tahun_terbit', 'penulis', 'penerbit', 'sinopsis', 'cetakan', 'status', 'cover'];

    protected $useTimestamps = false;

    public function checkError() {
        return $this->db->error();
    }

    public function affectedRows() {
        return $this->db->affectedRows();
    }

    public function getAllWithoutCover() {
        return $this->db->query("SELECT id_buku, isbn, judul, tahun_terbit, penulis, penerbit, sinopsis, cetakan, status FROM buku ORDER BY id_buku DESC");
    }

    public function searchBuku($query) {
        $query = strtolower($query);
        return $this->db->query("select b.id_buku, b.isbn, b.judul, b.tahun_terbit, b.penulis, b.penerbit, b.sinopsis, b.cetakan from buku b where lower(judul) like '%$query%'");
    }
}