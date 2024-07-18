<?php

namespace App\Models;

use CodeIgniter\Model;

class empleados_model extends Model
{

    //obtenemos empleado
    public function obtenerEmpleado($data){
        $empleado = $this->db->table('t_empleado');
        $empleado->where($data);
        return $empleado->get()->getResultArray();
    }


    //listar empleados
    public function listarNombres(){
        $Nombres = $this->db->query("SELECT * FROM t_empleado");
        return $Nombres->getResult();
        
    }

    //insertar empleados
    public function insertar($datos){
        //hacemos insercion
        $Nombres = $this->db->table('t_empleado');
        $Nombres->insert($datos);
        //regresamos el ultimo id que hayamos generado
        return $this->db->insertID();
    }

    public function obtenerNombre($data){
        $Nombres = $this->db->table('t_empleado');
        $Nombres->where($data);
        //retornamos un arreglo de arreglos
        return $Nombres->get()->getResultArray();
    }

    public function actualizar($data,$id_empleado){
        $Nombres = $this->db->table('t_empleado');
        $Nombres->set($data);
        $Nombres->where('id_empleado',$id_empleado);
        return $Nombres->update();
    }

    public function eliminar($data){
        $Nombres = $this->db->table('t_empleado');
        $Nombres->where($data);
        return $Nombres->delete();

    }


}