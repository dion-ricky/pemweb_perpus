<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddColumnExpectedAndRealizedReturnDate extends Migration
{
	public function up()
	{
		$fields = [
			'expected_return_date' => [
				'type' => 'DATE',
				'null' => false
			],
			'realized_return_date' => [
				'type' => 'DATE',
				'null' => true
			]
		];

		$this->forge->addColumn('transaksi', $fields);

		$this->db->query('ALTER TABLE transaksi CHANGE tanggal tanggal_pinjam DATE NOT NULL');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
