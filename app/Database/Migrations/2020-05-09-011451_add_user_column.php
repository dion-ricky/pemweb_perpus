<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterUser extends Migration
{
	public function up()
	{
		$fields = [
            'nomor_anggota'			=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> '10',
				'after'			=> 'id_user',
				'null'			=> false
			],
            'tanggal_keanggotaan'	=> [
				'type'			=> 'TIMESTAMP',
				'null'			=> false
			],
            'foto'					=> [
				'type'			=> 'BLOB',
				'null'			=> true
			],
            'status'				=> [
				'type'			=> 'CHAR',
				'constraint'	=> '1',
				'null'			=> false,
				'default'		=> '1'
			],
			'level'					=> [
				'type'			=> 'CHAR',
				'constraint'	=> '1',
				'null'			=> false,
				'default'		=> '0'
			]
		];

		$this->forge->addColumn('user', $fields);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
