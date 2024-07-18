<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTEmpleados extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_empleado' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'usuario' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '16',
            ],
            'nombre_empleado' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'apellidos_empleados' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'tipo_usuario' => [
                'type' => 'VARCHAR',
                'constraint' => '3',
            ],
        ]);
        $this->forge->addKey('id_empleado', true);
        $this->forge->createTable('t_empleado');
    }

    public function down()
    {
        $this->forge->dropTable('t_empleado');
    }
}
