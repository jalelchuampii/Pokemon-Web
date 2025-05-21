<?php
// Conexión a la base de datos
include 'db.php';

// Consulta para obtener todos los Pokémon ordenados por generación y nombre
$sql = "SELECT * FROM pokemon ORDER BY Generación, Nombre";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>pokemon_web</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-light">

<div class="container py-4">
  <h1 class="mb-4 text-center">Lista de Pokémon</h1>

  <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php if ($result && $result->num_rows > 0): ?>
      <?php while ($poke = $result->fetch_assoc()): ?>
        <div class="col">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($poke['Nombre']) ?></h5>
              <h6 class="card-subtitle mb-2 text-muted">Tipo: <?= htmlspecialchars($poke['Tipo']) ?> | Generación: <?= $poke['Generación'] ?></h6>
              <button class="btn btn-info btn-sm toggle-desc">Mostrar descripción</button>
              <p class="card-text mt-2 description" style="display:none;"><?= nl2br(htmlspecialchars($poke['Descripcion'])) ?></p>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p>No hay Pokémon para mostrar.</p>
    <?php endif; ?>
  </div>
</div>

<script>
  $(document).ready(function(){
    $('.toggle-desc').click(function(){
      const desc = $(this).siblings('.description');
      desc.slideToggle();
      $(this).text(desc.is(':visible') ? 'Ocultar descripción' : 'Mostrar descripción');
    });
  });
</script>

</body>
</html>

<?php
// Cerrar conexión
$conn->close();
?>
