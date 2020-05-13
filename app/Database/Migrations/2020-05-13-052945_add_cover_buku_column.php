<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCoverBukuColumn extends Migration
{
	public function up()
	{
		$fields = [
			'cover' => [
				'type' => 'BLOB',
				'null' => true
			]
		];

		$this->forge->addColumn('buku', $fields);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
