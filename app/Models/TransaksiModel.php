<?php namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model {
    protected $table      = 'transaksi';
    protected $primaryKey = 'id_transaksi';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['jenis', 'tanggal', 'id_user', 'id_buku'];

    protected $useTimestamps = false;

    public function checkError() {
        return $this->db->error();
    }

    public function affectedRows() {
        return $this->db->affectedRows();
    }

    public function getAllBooksNotReturned($email) {
        $email = esc($email);
        return $this->db->query("select b.id_buku, b.judul, b.isbn, b.penulis, b.penerbit, b.tahun_terbit, b.cetakan from (select t.id_buku, sum(case when t.jenis=0 then 1 else 0 end) peminjaman, sum(case when t.jenis=1 then 1 else 0 end) pengembalian from transaksi t inner join user u on u.id_user = t.id_user where u.email='$email' group by id_buku) trx inner join buku b on b.id_buku = trx.id_buku where trx.pengembalian<trx.peminjaman");
    }

    public function getTrxPeminjamanTerbaru($email, $id_buku) {
        return $this->db->query("select t.id_transaksi from transaksi t inner join user u on t.id_user = u.id_user where t.id_buku=$id_buku AND t.jenis=0 AND u.email='$email' order by t.tanggal desc, t.id_transaksi desc limit 1");
    }

    public function getDetailTransaksi($id_transaksi) {
        return $this->db->query("select t.id_transaksi, t.jenis, t.tanggal, t.id_user, t.id_buku, b.judul, b.isbn, u.nama, u.email from transaksi t inner join user u on t.id_user = u.id_user inner join buku b on t.id_buku = b.id_buku where id_transaksi=$id_transaksi");
    }
}