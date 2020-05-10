<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DropUsernameColumn extends Migration
{
	public function up()
	{
		$this->db->query('ALTER TABLE user DROP username');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
