<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddNotNullToEmail extends Migration
{
	public function up()
	{
		$this->db->query('ALTER TABLE user CHANGE email email VARCHAR(255) NOT NULL');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
