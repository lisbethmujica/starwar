<?php
$url = 'https://swapi.py4e.com/api/starships';
$response = @file_get_contents($url);
$data = json_decode($response, true);
$naves = isset($data['results']) ? $data['results'] : [];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>SAGA STARWAR</title>
  <link rel="stylesheet" href="css/index.css">
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet">
</head>
<body>
  <div class="animacion">
    <?php for ($i = 0; $i < 50; $i++): ?>
    <div class="particula" style="top: <?= rand(0, 110) ?>%; left: <?= rand(0, 110) ?>%; animation-delay: <?= rand(0, 10) ?>s;"></div>
    <?php endfor; ?>
  </div>

  <div class="contenedor">
    <div class="intro">
      <h1>¿ERES AMANTE DE LAS SAGAS DE STAR WARS?</h1>
      <hr>
      <div class="parte2">
      <a href="people.php">👤Personas</a>
        <a href="index.php">🌏 Planetas</a>
        <a href="starships.php"> 🚀 Naves</a>
      </div>
    </div>
  </div>

  <div class="parent">
  <?php foreach ($naves as $nave): ?>
    <div class="tarjetitas">
      <div class="tarjeta-header"><?= htmlspecialchars($nave['name']) ?></div>
      <div class="tarjeta-body">
        <p><strong>Modelo:</strong> <?= $nave['model'] ?></p>
        <p><strong>Fabricante:</strong> <?= $nave['manufacturer'] ?></p>
        <p><strong>Capacidad:</strong> <?= $nave['passengers'] ?> pasajeros</p>
        <p><strong>Clase:</strong> <?= $nave['starship_class'] ?></p>
        <p><strong>Velocidad:</strong> <?= $nave['max_atmosphering_speed'] ?> km/h</p>
      </div>
    </div>
  <?php endforeach; ?>
</div>
<script src="js/api.js"></script>
</body>
</html>
