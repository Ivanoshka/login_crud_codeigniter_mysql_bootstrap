<?php 
namespace App\Controllers;

use App\Models\empleados_model;
use CodeIgniter\Controller;

class PasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('forgot_password');
    }

    public function sendResetLinkEmail()
    {
        $email = $this->request->getPost('email');
        $Empleado = new empleados_model();

        // Verifica si el correo electrónico existe en la base de datos
        $datosUsuario = $Empleado->obtenerEmpleado(['email' => $email]);

        if (count($datosUsuario) > 0) {
            // Aquí agregaríamos la lógica para enviar el enlace de recuperación
            // Por ejemplo, generar un token y enviar un correo electrónico

            return redirect()->to(base_url('/forgot-password'))->with('mensaje', 'Se ha enviado un enlace de recuperación a tu correo electrónico.');
        } else {
            return redirect()->to(base_url('/forgot-password'))->with('mensaje', 'Correo electrónico no encontrado.');
        }
    }
}


?>