<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tu Profe en QR</title>
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/header.css">
</head>

<body>
  <div class="background-overlay"></div>
  <header class="header">

    <a class="header-title"href="<?= ROOT ?>/home">Tu Profe en QR 💪</a>

    <ul>
      <?php if($_SESSION['USER']): ?>
      <li>
        <a href="<?= ROOT ?>/upload"> Subir archivo </a>
      </li>
      <li>
        <a href="<?= ROOT ?>/logout"> Cerrar sesión </a>
      </li>
      <?php endif?>
    </ul>
  </header>