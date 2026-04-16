<?php
session_start();
$password = $_SESSION['password'] ?? null;
$errore = $_SESSION['errore'] ?? null;

unset($_SESSION['password'], $_SESSION['errore']);
?>

<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <title>Risultato</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="p-4 bg-secondary rounded text-center">
        <?php if ($password): ?>
        	<h3>Password generata</h3>
        	<p class="fs-4"><?= $password ?></p>
        <?php else: ?>
          <h3>Errore</h3>
          <p><?= $errore ?></p>
        <?php endif; ?>
          <a href="index.php" class="btn btn-dark mt-3">Torna indietro</a>
      </div>
    </div>
  </div>
</div>
</body>
</html>