<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RemoveOnUpdateCurrentTimestamp extends Migration
{
	public function up()
	{
		$this->db->query('ALTER TABLE user CHANGE tanggal_keanggotaan tanggal_keanggotaan timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
