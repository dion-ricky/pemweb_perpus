<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class IncreaseBlobSize extends Migration
{
	public function up()
	{
		$this->db->query('ALTER TABLE buku CHANGE cover cover MEDIUMBLOB');
		$this->db->query('ALTER TABLE user CHANGE foto foto MEDIUMBLOB');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
