<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Empleado extends Seeder
{
    public function run()
    {
        $usuario = "admin";
        $password= password_hash("123",PASSWORD_DEFAULT);
        $nombre_empleado = "Juan Manuel";
        $apellidos_empleados = "Gonzalez Lopez";
        $tipo_usuario = "1";

        $data = [
            'usuario' => $usuario,
            'password'    => $password,
            'nombre_empleado' => $nombre_empleado,
            'apellidos_empleados' => $apellidos_empleados,
            'tipo_usuario' => $tipo_usuario
        ];

        // Simple Queries
        //$this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Uso Query Builder
        $this->db->table('t_empleado')->insert($data);
    }
}
