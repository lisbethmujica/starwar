<?php
$url = 'https://swapi.py4e.com/api/planets';
$response = @file_get_contents($url);
$data = json_decode($response, true);
$planetas = isset($data['results']) ? $data['results'] : [];
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
        <a href="starships.php">🚀 Naves</a>
      </div>
    </div>
  </div>

  <div class="parent">
    <?php foreach ($planetas as $planeta): ?>
    <div class="card tarjetitas">
  <div class="tarjeta-header">
     <?= $planeta['name'] ?>
  </div>
  <div class="tarjeta-body">
    <p><strong>Clima:</strong> <?= $planeta['climate'] ?></p>
    <p><strong>Terreno:</strong> <?= $planeta['terrain'] ?></p>
    <p><strong>Diámetro:</strong> <?= $planeta['diameter'] ?> km</p>
    <p><strong>Gravedad:</strong> <?= $planeta['gravity'] ?></p>
    <p><strong>Período Orbital:</strong> <?= $planeta['orbital_period'] ?> días</p>
    <p><strong>Rotación:</strong> <?= $planeta['rotation_period'] ?> horas</p>
    <p><strong>Agua Superficial:</strong> <?= $planeta['surface_water'] ?>%</p>
    <p><strong>Población:</strong> <?= $planeta['population'] !== 'unknown' ? $planeta['population'] : 'Desconocida' ?></p>
    <p><strong>Residentes:</strong> <?= count($planeta['residents']) ?> conocidos</p>
  </div>
</div>
    <?php endforeach; ?>
  </div>
  <script src="js/api.js"></script>
</body>
</html>
