<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTrxColumn extends Migration
{
	public function up()
	{
		$fields = [
			'id_transaksi'	=> [
				'type'				=> 'INT',
				'auto_increment'	=> true,
				'first'				=> true,
				'null'				=> false
			],
			'jenis'			=> [
				'type'				=> 'CHAR',
				'constraint'		=> '1',
				'null'				=> false
			],
			'tanggal'	=> [
				'type'	=> 'DATE',
				'null'	=> false,
				]
			];
			
		$this->forge->addColumn('transaksi', $fields);
		
		$this->forge->addPrimaryKey('id_transaksi');

		$this->forge->dropColumn('transaksi', ['id_user','id_buku','timestamp']);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
