<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ChangeNomorAnggotaLength extends Migration
{
	public function up()
	{
		$this->db->query('ALTER TABLE user CHANGE nomor_anggota nomor_anggota VARCHAR(20) NOT NULL');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
