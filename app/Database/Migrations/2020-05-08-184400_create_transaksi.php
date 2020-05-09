<?php namespace App\Database\Migrations;

class CreateTransaksi extends \CodeIgniter\Database\Migration {

    public function up()
    {
        $this->forge->addField([
            'id_transaksi'	=> [
				'type'				=> 'SMALLINT',
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
				'type'              => 'DATE',
				'null'              => false
            ],
            'id_user'   => [
                'type'              => 'INT',
                'constraint'        => '45',
                'null'              => false
            ],
            'id_buku'   => [
                'type'              => 'INT',
                'constraint'        => '30',
                'null'              => false
            ]
        ]);
        
        $this->forge->addForeignKey('id_user', 'user', 'id_user');
        $this->forge->addForeignKey('id_buku', 'buku', 'id_buku');

        $this->forge->addPrimaryKey('id_transaksi');
        
        $this->forge->createTable('transaksi');
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('transaksi');
        $this->db->enableForeignKeyChecks();
    }

}