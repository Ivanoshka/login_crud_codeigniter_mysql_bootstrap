<?php

namespace App\Controllers;

use App\Models\empleados_model;

class Home extends BaseController
{
    public function index(): string
    {
        //funcion para mostrar mensaje de error
        $mensaje = session('mensaje');
        return view('login', ["mensaje" => $mensaje]);
    }

    //funcion que lista todo los empleados
    public function inicio(): string
    {

        $crud = new empleados_model();
        $datos=$crud->listarNombres();
//mensaje de que se creo,edito o elimino mensaje
        $mensaje = session('mensaje');
//datos de los empleados
        $dataEmpleados= [
            "datos" => $datos,
            "mensaje" => $mensaje
        ];

        return view('inicio',$dataEmpleados);
    }

    //funcion iniciar sesion
    public function login()
    {
        $usuario = $this->request->getPost('usuario');
        $password = (string) $this->request->getPost('password');
        $Empleado = new empleados_model();

        $datosUsuario = $Empleado->obtenerEmpleado(['usuario' => $usuario]);

        if (count($datosUsuario) > 0) {
            $data = [
                "usuario" => $datosUsuario[0]['usuario'],
                "password" => $datosUsuario[0]["password"],
                "tipo_usuario" => $datosUsuario[0]['tipo_usuario'],
                "fecha_nacimiento" => $datosUsuario[0]['fecha_nacimiento'],
                "direccion" => $datosUsuario[0]['direccion'],
                "telefono" => $datosUsuario[0]['telefono']
            ];

            $session = session();
            $session->set($data);

            return redirect()->to(base_url('/inicio'))->with('mensaje', '');
        } else {
            return redirect()->to(base_url('/'))->with('mensaje', 'Usuario no encontrado');
        }
    }
//funcion salir
    public function salir()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }

    //funcion para crear empleados
    public function crear(){
        $datos=[
            "usuario" => $_POST['usuario'], 
            "nombre_empleado"=> $_POST['nombre_empleado'],
            "apellidos_empleados" => $_POST['apellidos_empleados'],
            "fecha_nacimiento" => $_POST['fecha_nacimiento'], 
            "direccion"=> $_POST['direccion'],
            "telefono" => $_POST['telefono']
        ];

        $crud = new empleados_model();
        $respuesta = $crud->insertar($datos);

        if ($respuesta > 0){ //redireccionamos al inicio
            return redirect()->to(base_url().'/inicio')->with('mensaje','1');
        }else{
            return redirect()->to(base_url().'/inicio')->with('mensaje','0');
        }

        
    }

    //funcion para actualizar empleados
    public function actualizar(){

        //RECIBIMOS LOS DATOS A MODIFICAR
        $datos = [
            "id_empleado" => $_POST['id_empleado'],
            "usuario" => $_POST['usuario'],
            "nombre_empleado" => $_POST['nombre_empleado'],
            "apellidos_empleados" => $_POST['apellidos_empleados'],
            "fecha_nacimiento" => $_POST['fecha_nacimiento'], 
            "direccion"=> $_POST['direccion'],
            "telefono" => $_POST['telefono']
        ];

        $id_empleado=$_POST['id_empleado'];
        $crud = new empleados_model();

        $respuesta = $crud->actualizar($datos,$id_empleado);

        if ($respuesta){ //redireccionamos al inicio
            return redirect()->to(base_url().'/inicio')->with('mensaje','2');
        }else{
            return redirect()->to(base_url().'/inicio')->with('mensaje','3');
        }


    }

    //funcion para obtenerNombre
    public function obtenerNombre($id_empleado){
        $data = [
            "id_empleado" => $id_empleado
        ];
        $crud = new empleados_model();
        $respuesta = $crud->obtenerNombre($data);

        $datos = ["datos" => $respuesta];

        //retornamos vista
        return view('editar',$datos);



    } 

    //funcion eliminar
    public function eliminar($id_empleado){
        $crud = new empleados_model();
        $data = ["id_empleado" => $id_empleado];
        $respuesta=$crud->eliminar($data);

        
        if ($respuesta){ //redireccionamos al inicio
            return redirect()->to(base_url().'/inicio')->with('mensaje','4');
        }else{
            return redirect()->to(base_url().'/inicio')->with('mensaje','5');
        }
    }



}



