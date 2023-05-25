<?php include("base.php") ?>
<?php 
    if(isset($_SESSION['persona']))
      header("Location: index.php");
?>
<?php startblock('cuerpo') ?>
  
<div class="row">
  <div class="col-4"></div>
  <div class="col-4">
    <div class="card">
      <div class="card-body">
        <div class="row mb-4">
          <div class="col-12 text-center">
            <div class="fs-2 text-primary">Iniciar sesión</div>
            <div class="fs-5 text-secondary">Ingresa tu usuario y contraseña</div>
          </div>
        </div>
        <form action="controller/controller_persona.php" method="post">
          <input type="hidden" name="action" value="login">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="text" name="usuario" id="usuario" class="form-control" required />
            <label class="form-label" for="usuario">Usuario</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" name="password" id="password" class="form-control" required />
            <label class="form-label" for="password">Contraseña</label>
          </div>

          <!-- Submit button -->
          <input type="submit" class="btn btn-primary btn-block mb-4" value="Ingresar"></input>

          <!-- Register buttons -->
          <div class="text-center">
            <p>¿No tienes una cuenta? <a href="formPersona.php">Registrarte</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-4"></div>
</div>

<?php endblock() ?>