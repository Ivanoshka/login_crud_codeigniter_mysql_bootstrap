<?php 
    $id_empleado = $datos[0]['id_empleado'];
    $usuario = $datos[0]['usuario'];
    $nombre_empleado = $datos[0]['nombre_empleado'];
    $apellidos_empleados = $datos[0]['apellidos_empleados'];
    $fecha_nacimiento = $datos[0]['fecha_nacimiento'];
    $direccion = $datos[0]['direccion'];
    $telefono = $datos[0]['telefono'];
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

  <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><?php echo session('usuario'); ?> </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">INICIO</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('/salir'); ?>">CERRAR SESIÓN</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-4">
    <h1 class="text-center">ACTUALIZAR EMPLEADOS</h1>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form action="<?php echo base_url().'/actualizar' ?>" method="post">
          <input type="hidden" id="id_empleado" name="id_empleado" value="<?php echo $id_empleado ?>">
          
          <div class="mb-3">
            <label for="usuario" class="form-label">Usuario</label>
            <input type="text" name="usuario" id="usuario" class="form-control" value="<?php echo $usuario ?>">
          </div>
          
          <div class="mb-3">
            <label for="nombre_empleado" class="form-label">Nombre</label>
            <input type="text" name="nombre_empleado" id="nombre_empleado" class="form-control" value="<?php  echo $nombre_empleado ?>">
          </div>
          
          <div class="mb-3">
            <label for="apellidos_empleados" class="form-label">Apellidos</label>
            <input type="text" name="apellidos_empleados" id="apellidos_empleados" class="form-control" value="<?php echo $apellidos_empleados ?>">
          </div>
          
          <div class="mb-3">
            <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" value="<?php echo $fecha_nacimiento ?>">
          </div>
          
          <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" name="direccion" id="direccion" class="form-control" value="<?php echo $direccion ?>">
          </div>
          
          <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" name="telefono" id="telefono" class="form-control" value="<?php echo $telefono ?>">
          </div>
          
          <button class="btn btn-warning">Guardar</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
