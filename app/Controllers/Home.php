<?php

namespace App\Controllers;

use App\Models\empleados_model;

class Home extends BaseController
{
    public function index(): string
    {
        // Verificar si la cookie de "Recuérdame" existe
        $request = \Config\Services::request();
        if ($request->getCookie('rememberMe')) {
            $usuario = $request->getCookie('rememberMe');
            $session = session();
            $session->set('usuario', $usuario);
            return redirect()->to(base_url('/inicio'));
        }

        // Mostrar mensaje de error si existe
        $mensaje = session('mensaje');
        return view('login', ["mensaje" => $mensaje]);
    }

    // Función que lista todos los empleados
    public function inicio(): string
    {
        $crud = new empleados_model();
        $datos = $crud->listarNombres();

        // Mensaje de que se creó, editó o eliminó mensaje
        $mensaje = session('mensaje');

        // Datos de los empleados
        $dataEmpleados = [
            "datos" => $datos,
            "mensaje" => $mensaje
        ];

        return view('inicio', $dataEmpleados);
    }

    // Función iniciar sesión
    public function login()
    {
        $usuario = $this->request->getPost('usuario');
        $password = (string)$this->request->getPost('password');
        $rememberMe = $this->request->getPost('rememberMe');
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

            if ($rememberMe) {
                $this->setRememberMe($usuario);
            }

            return redirect()->to(base_url('/inicio'))->with('mensaje', '');
        } else {
            return redirect()->to(base_url('/'))->with('mensaje', 'Usuario no encontrado');
        }
    }

    // Función para configurar la cookie de "Recuérdame"
    private function setRememberMe($usuario)
    {
        $response = \Config\Services::response();
        $cookie = [
            'name' => 'rememberMe',
            'value' => $usuario,
            'expire' => '1209600',  // 2 semanas
            'path' => '/',
            'prefix' => '',
            'secure' => false,  // Cambia a true si usas HTTPS
            'httponly' => true,
        ];

        $response->setCookie($cookie);
    }

    // Función salir
    public function salir()
    {
        $session = session();
        $session->destroy();
        
        $response = \Config\Services::response();
        $response->deleteCookie('rememberMe');

        return redirect()->to(base_url('/'));
    }

    // Función para crear empleados
    public function crear()
    {
        $datos = [
            "usuario" => $_POST['usuario'],
            "nombre_empleado" => $_POST['nombre_empleado'],
            "apellidos_empleados" => $_POST['apellidos_empleados'],
            "fecha_nacimiento" => $_POST['fecha_nacimiento'],
            "direccion" => $_POST['direccion'],
            "telefono" => $_POST['telefono']
        ];

        $crud = new empleados_model();
        $respuesta = $crud->insertar($datos);

        if ($respuesta > 0) { // Redireccionamos al inicio
            return redirect()->to(base_url() . '/inicio')->with('mensaje', '1');
        } else {
            return redirect()->to(base_url() . '/inicio')->with('mensaje', '0');
        }
    }

    // Función para actualizar empleados
    public function actualizar()
    {
        // Recibimos los datos a modificar
        $datos = [
            "id_empleado" => $_POST['id_empleado'],
            "usuario" => $_POST['usuario'],
            "nombre_empleado" => $_POST['nombre_empleado'],
            "apellidos_empleados" => $_POST['apellidos_empleados'],
            "fecha_nacimiento" => $_POST['fecha_nacimiento'],
            "direccion" => $_POST['direccion'],
            "telefono" => $_POST['telefono']
        ];

        $id_empleado = $_POST['id_empleado'];
        $crud = new empleados_model();

        $respuesta = $crud->actualizar($datos, $id_empleado);

        if ($respuesta) { // Redireccionamos al inicio
            return redirect()->to(base_url() . '/inicio')->with('mensaje', '2');
        } else {
            return redirect()->to(base_url() . '/inicio')->with('mensaje', '3');
        }
    }

    // Función para obtener nombre
    public function obtenerNombre($id_empleado)
    {
        $data = [
            "id_empleado" => $id_empleado
        ];
        $crud = new empleados_model();
        $respuesta = $crud->obtenerNombre($data);

        $datos = ["datos" => $respuesta];

        // Retornamos vista
        return view('editar', $datos);
    }

    // Función eliminar
    public function eliminar($id_empleado)
    {
        $crud = new empleados_model();
        $data = ["id_empleado" => $id_empleado];
        $respuesta = $crud->eliminar($data);

        if ($respuesta) { // Redireccionamos al inicio
            return redirect()->to(base_url() . '/inicio')->with('mensaje', '4');
        } else {
            return redirect()->to(base_url() . '/inicio')->with('mensaje', '5');
        }
    }
}
