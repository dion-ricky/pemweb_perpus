<?php namespace App\Database\Migrations;

class CreateUser extends \CodeIgniter\Database\Migration {

    public function up()
    {
        $this->forge->addField([
            'id_user'   => [
                'type'              => 'INT',
                'constraint'        => '45',
                'auto_increment'    => true
            ],
            'username'  => [
                'type'              => 'VARCHAR',
                'constraint'        => '45',
                'null'              => false
            ],
            'nama'      => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
                'null'              => false
            ],
            'email'     => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
                'null'              => true
            ],
            'password'  => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
                'null'              => false
            ]
        ]);

        $this->forge->addPrimaryKey('id_user', true);
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('user');
    }
}