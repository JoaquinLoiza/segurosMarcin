<!DOCTYPE html>
<html lang="es">
<head>
  <base href="{$base_url}">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Seguros Marcín</title>
  <link rel="shorcut icon" type="image/x-icon" href="images/icon.png">
  <!--Bootstrap 4-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <!--Google fonts-->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
  <!--Iconos-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <!--Esttilos css-->
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/style404notFound.css">
</head>
<body>
    <header class="bg-dark pt-4">
      <div class="d-flex justify-content-between flex-wrap align-items-center">
        <a href=""><img class="logo row ml-5 mb-3" src="./images/logo.png" alt="Logotipo"></a>
        <!--Si existe un usuario lo muestra junto con el boton desplegable para Logout-->
        {if !empty($user)}
        <div class="dropdown mr-5">
            <!--Si el usuario es administrador agregar un boton para acceder a "administrar"-->
            {if $administrator == 1}
            <a class="btn btn-outline-light ml-4 mt-1"href="showABM">Administrar</a>
            {/if}
            <button type="button" class="btn btn-outline-light dropdown-toggle ml-4 mt-1" data-toggle="dropdown">
            {$user}
            </button>
           <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="logout">Logout</a>
            </div>
        </div>
        {else}
        <!--Botones login & Registrarse-->
        <div class="mr-5">
          <a class="btn btn-outline-light ml-4 mt-1" href="login">Iniciar Sesión</a>
          <a class="btn btn-outline-light ml-4 mt-1" href="register">Regístrate</a>
        </div>
        {/if}
      </div>
      <!--Barra de navegación-->
      <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarCollapse"
        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav m-auto">
            <li><a class="navbar-brand ml-5 mr-5 mb-2" href="home">Home</a></li>
            <li><a class="navbar-brand ml-5 mr-5 mb-2" href="contacts">Contactos</a></li>
            <li><a class="navbar-brand ml-5 mr-5 mb-2" href="aboutUs">¿Quiénes somos?</a></li>
          </ul>
        </div>
      </nav>
</header>