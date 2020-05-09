<?php namespace App\Database\Migrations;

class CreateBuku extends \CodeIgniter\Database\Migration {
    
    public function up()
    {
        $this->forge->addField([
            'id_buku'       => [
                'type'              => 'INT',
                'constraint'        => '30',
                'auto_increment'    => true,
                'null'              => false
            ],
            'isbn'       => [
                'type'              => 'VARCHAR',
                'constraint'        => '25',
                'null'              => false
            ],
            'judul'         => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
                'null'              => false
            ],
            'tahun_terbit'  => [
                'type'              => 'SMALLINT',
                'constraint'        => '4',
                'null'              => true
            ],
            'penulis'     => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
                'null'              => true,
            ],
            'penerbit'      => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
                'null'              => true
            ],
            'sinopsis'      => [
                'type'              => 'LONGTEXT',
                'null'              => true
            ]
        ]);

        $this->forge->addPrimaryKey('id_buku', true);
        $this->forge->createTable('buku');
    }

    public function down()
    {   
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('buku');
        $this->db->enableForeignKeyChecks();
    }
}