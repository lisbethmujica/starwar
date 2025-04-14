<?php
$url = 'https://swapi.py4e.com/api/people';
$response = @file_get_contents($url);
$data = json_decode($response, true);
$personas = isset($data['results']) ? $data['results'] : [];

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
    <?php if (!empty($personas)): ?>
        <?php foreach ($personas as $persona): ?>
            <?php
            $planeta = 'Desconocido';
            if (isset($persona['homeworld'])) {
                $homeworldResponse = @file_get_contents($persona['homeworld']);
                $homeworldData = json_decode($homeworldResponse, true);
                if (isset($homeworldData['name'])) {
                    $planeta = $homeworldData['name'];
                }
            }
            ?>
            <div class="tarjetitas">
                <div class="tarjeta-header">
                    <?= htmlspecialchars($persona['name']) ?>
                </div>
                <div class="tarjeta-body">
                    <p><strong>Género:</strong> <?= ucfirst($persona['gender']) ?></p>
                    <p><strong>Color de piel:</strong> <?= ucfirst($persona['skin_color']) ?></p>
                    <p><strong>Color de cabello:</strong> <?= ucfirst($persona['hair_color']) ?></p>
                    <p><strong>Color de ojos:</strong> <?= ucfirst($persona['eye_color']) ?></p>
                    <p><strong>Altura:</strong> <?= $persona['height'] ?> cm</p>
                    <p><strong>Peso:</strong> <?= $persona['mass'] ?> kg</p>
                    <p><strong>Año de nacimiento:</strong> <?= $persona['birth_year'] ?></p>
                    <p><strong>Planeta de origen:</strong> <?= $planeta ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
  </div>

  <script src="js/api.js"></script>
</body>
</html>
