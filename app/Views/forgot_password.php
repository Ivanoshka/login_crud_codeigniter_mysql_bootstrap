<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olvidaste tu contraseña</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #e2e2e2 0%, #ffffff 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .forgot-password-container {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            padding: 2rem;
            width: 100%;
            max-width: 400px;
        }
        .forgot-password-container h2 {
            margin-bottom: 1.5rem;
            color: #333333;
            font-weight: 600;
        }
        .forgot-password-container .form-control {
            border-radius: 4px;
            border: 1px solid #ced4da;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);
            padding: 0.75rem;
        }
        .forgot-password-container .btn-primary {
            background: linear-gradient(90deg, #007bff, #0056b3);
            border: none;
            border-radius: 4px;
            padding: 0.75rem;
            font-size: 1rem;
            color: #ffffff;
            transition: background 0.3s ease, box-shadow 0.3s ease;
        }
        .forgot-password-container .btn-primary:hover {
            background: linear-gradient(90deg, #0056b3, #003d7a);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .forgot-password-container .back-to-login {
            font-size: 0.875rem;
            text-align: right;
            display: block;
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .forgot-password-container .back-to-login:hover {
            color: #0056b3;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="forgot-password-container">
        <h2>Olvidaste tu contraseña</h2>
        
        <?php if (session('mensaje')): ?>
            <div class="alert alert-danger">
                <?= session('mensaje') ?>
            </div>
        <?php endif; ?>

        <form action="<?php echo base_url('/forgot_password') ?>" method="POST">
            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" class="form-control" id="email" placeholder="Introduce tu correo electrónico" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Enviar enlace de recuperación</button>
            <a href="<?php echo base_url('/'); ?>" class="back-to-login">Volver al inicio de sesión</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
