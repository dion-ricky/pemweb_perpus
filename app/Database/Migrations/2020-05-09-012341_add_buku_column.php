<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddBukuColumn extends Migration
{
	public function up()
	{
		$fields = [
			'cetakan'	=> [
				'type'			=> 'SMALLINT',
				'null'			=> true
			],
			'status'	=> [
				'type'			=> 'CHAR',
				'constraint'	=> '1',
				'null'			=> false,
				'default'		=> '0'
			],
		];

		$this->forge->addColumn('buku', $fields);
	}
	
	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
