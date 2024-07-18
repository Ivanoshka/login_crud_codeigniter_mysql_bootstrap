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
    <?php if (session('mensaje') == '1') : ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        ¡Registro exitoso!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php elseif (session('mensaje') == '0') : ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Error al registrar el empleado.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>
    <?php if (session('mensaje') == '2') : ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        ¡Empleado Actualizado!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php elseif (session('mensaje') == '3') : ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Error al actualizar el empleado.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

    <?php if (session('mensaje') == '4') : ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        ¡Empleado Eliminado Con Exito!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php elseif (session('mensaje') == '5') : ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Error al eliminar el empleado.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>
  </div>

  <div class="container">
    <h1>REGISTRO DE EMPLEADOS</h1>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form action="<?php echo base_url() . '/crear' ?>" method="post">
          <div class="mb-3">
            <label for="usuario" class="form-label">Usuario</label>
            <input type="text" name="usuario" id="usuario" class="form-control">
          </div>
          <div class="mb-3">
            <label for="nombre_empleado" class="form-label">Nombre</label>
            <input type="text" name="nombre_empleado" id="nombre_empleado" class="form-control">
          </div>
          <div class="mb-3">
            <label for="apellidos_empleados" class="form-label">Apellidos</label>
            <input type="text" name="apellidos_empleados" id="apellidos_empleados" class="form-control">
          </div>
          <div class="mb-3">
            <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control">
          </div>
          <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" name="direccion" id="direccion" class="form-control">
          </div>
          <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" name="telefono" id="telefono" class="form-control">
          </div>
          <button class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>

    <h2 class="mt-4">EMPLEADOS</h2>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">Usuario</th>
          <th scope="col">Nombre</th>
          <th scope="col">Apellido</th>
          <th scope="col">Fecha de Nacimiento</th>
          <th scope="col">Dirección</th>
          <th scope="col">Teléfono</th>
          <th scope="col">Editar</th>
          <th scope="col">Eliminar</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($datos as $key) : ?>
          <tr>
            <td><?php echo $key->usuario ?></td>
            <td><?php echo $key->nombre_empleado ?></td>
            <td><?php echo $key->apellidos_empleados ?></td>
            <td><?php echo $key->fecha_nacimiento ?></td>
            <td><?php echo $key->direccion ?></td>
            <td><?php echo $key->telefono ?></td>
            <td>
              <a href="<?php echo base_url() . '/obtenerNombre/' . $key->id_empleado ?>" class="btn btn-warning btn-sm">Editar</a>
            </td>
            <td>
              <a href="<?php echo base_url() . '/eliminar/' . $key->id_empleado ?>" class="btn btn-danger btn-sm">Eliminar</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
