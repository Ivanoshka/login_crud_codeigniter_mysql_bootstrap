<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        .login-container {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            padding: 2rem;
            width: 100%;
            max-width: 400px;
        }
        .login-container h2 {
            margin-bottom: 1.5rem;
            color: #333333;
            font-weight: 600;
        }
        .login-container .form-control {
            border-radius: 4px;
            border: 1px solid #ced4da;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);
            padding: 0.75rem;
        }
        .login-container .btn-primary {
            background: linear-gradient(90deg, #007bff, #0056b3);
            border: none;
            border-radius: 4px;
            padding: 0.75rem;
            font-size: 1rem;
            color: #ffffff;
            transition: background 0.3s ease, box-shadow 0.3s ease;
        }
        .login-container .btn-primary:hover {
            background: linear-gradient(90deg, #0056b3, #003d7a);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .login-container .form-check-label {
            font-size: 0.875rem;
        }
        .login-container .forgot-password {
            font-size: 0.875rem;
            text-align: right;
            display: block;
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .login-container .forgot-password:hover {
            color: #0056b3;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        
        <?php if (session('mensaje')): ?>
            <div class="alert alert-danger">
                <?= session('mensaje') ?>
            </div>
        <?php endif; ?>

        <form action="<?php echo base_url('/login') ?>" method="POST">
            <div class="form-group">
                <label for="usuario">Usuario</label>
                <input type="text" class="form-control" id="usuario" placeholder="Introduce tu usuario" name="usuario" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" placeholder="Introduce tu contraseña" name="password" required>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="rememberMe">
                <label class="form-check-label" for="rememberMe">Recuérdame</label>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
            <a href="#" class="forgot-password">¿Olvidaste tu contraseña?</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
