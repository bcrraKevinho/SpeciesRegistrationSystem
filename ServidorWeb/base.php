<?php require_once 'method/ti.php' ?> <!-- Librería PHP Template Inheritance, para manejar herencias -->
<?php include("alertas.php");?> <!-- Muestra las diversas alertas dentro del sistema -->
<?php session_start(); ?>  <!-- Muestra las diversas alertas dentro del sistema -->

<?php //Recupera el nombre de la pestaña activa
$first_part = explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))[2]; ?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap CSS -->
  <link rel="icon" href="images/logo.png">
  <link href="css/style.css" rel="stylesheet">

  <title>SRER - Sistema de Registro de Especies por Regiones</title>
</head>

<body>
  <div class="bg-white mb-3">
    <div class="container">
      <header class="d-flex flex-wrap justify-content-center py-3 border-bottom">
        <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
          <img src="images/logo.png" class="me-2" width="40">
          <span class="fs-4">Sistema de Registro de Especies por Regiones</span>
        </a>
        <ul class="nav nav-pills">
          <li class="nav-item"><a href="index.php" class="nav-link <?php if ($first_part == "index.php" || $first_part == "misAvistamientos.php") echo "active"; ?>">Home</a></li>
          <li class="nav-item"><a href="especies.php" class="nav-link <?php if ($first_part == "especies.php") echo "active"; ?>">Especies</a></li>
          <li class="nav-item"><a href="investigadores.php" class="nav-link <?php if ($first_part == "investigadores.php" || $first_part == "misColaboraciones.php") echo "active"; ?>">Investigadores</a></li>
          <li class="nav-item"><a href="admin.php" class="nav-link <?php if ($first_part == "admin.php") echo "active"; ?>">Admin</a></li>
        </ul>
        <form action="controller/controller_persona.php" method="post" onsubmit='redirect();return false;'
        class="<?php if (!isset($_SESSION['persona'])) echo "invisible"; ?> ps-3" >
          <input type="hidden" name="action" id="action" value="logout">
          <input type="image" src="images/logout.png" alt="" width="32">
        </form>
      </header>
    </div>
    <div style="background: #f6f9ff">
      <div class="container">
        <?php if ($visible) { ?>
          <div class="alert <?php echo $attr; ?> alert-dismissible fade show " role="alert">
            <?php echo $msg; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
  
  <!-- Cuerpo heredado -->
  <div class="container">
    <?php startblock('cuerpo') ?>
    <?php endblock() ?>
  </div>
  
  <!-- Script heredado -->
  <script src="js/bootstrap.bundle.min.js"></script>
  <?php startblock('script') ?>
  <?php endblock() ?>
</body>

</html>