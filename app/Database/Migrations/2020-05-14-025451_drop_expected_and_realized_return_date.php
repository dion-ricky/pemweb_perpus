<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DropExpectedAndRealizedReturnDate extends Migration
{
	public function up()
	{
		$this->db->query('ALTER TABLE transaksi DROP expected_return_date');
		$this->db->query('ALTER TABLE transaksi DROP realized_return_date');
		$this->db->query('ALTER TABLE transaksi CHANGE tanggal_pinjam tanggal DATE NOT NULL');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
