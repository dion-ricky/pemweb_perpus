<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUniqueConstraint extends Migration
{
	public function up()
	{
		$this->db->query('ALTER TABLE user ADD UNIQUE KEY user_unique_1(username)');
		$this->db->query('ALTER TABLE user ADD UNIQUE KEY user_unique_2(email)');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->db->query('ALTER TABLE user DROP INDEX user_unique_1');
		$this->db->query('ALTER TABLE user DROP INDEX user_unique_2');
	}
}
