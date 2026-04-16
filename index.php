<?php
session_start();
require_once 'functions.php';

if (isset($_GET['lunghezza'])) {
  $lunghezza = (int) $_GET['lunghezza'];
  $minuscole = isset($_GET['minuscole']);
  $maiuscole = isset($_GET['maiuscole']);
  $numeri    = isset($_GET['numeri']);
  $simboli   = isset($_GET['simboli']);
  $password = generaPassword($lunghezza, $minuscole, $maiuscole, $numeri, $simboli);
  if ($password) {
    $_SESSION['password'] = $password;
    header("Location: result.php");
    exit;
  } else {
    	$_SESSION['errore'] = "Seleziona almeno un set di caratteri";
      header("Location: result.php");
      exit;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
  <title>password generator</title>
</head>
<body>
  <?php require_once 'header.php'; ?>
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="p-4 bg-secondary text-white rounded text-center">
          <h3>Genera Password</h3>
          <form method="GET">
          	<input type="number" name="lunghezza" class="form-control mb-3" min="1" required>
          	<div class="form-check text-start">
            	<input class="form-check-input" type="checkbox" name="minuscole" checked>
            	<label class="form-check-label">Minuscole</label>
          	</div>
          	<div class="form-check text-start">
            	<input class="form-check-input" type="checkbox" name="maiuscole" checked>
            	<label class="form-check-label">Maiuscole</label>
          	</div>
          	<div class="form-check text-start">
          		<input class="form-check-input" type="checkbox" name="numeri" checked>
            	<label class="form-check-label">Numeri</label>
          	</div>
          	<div class="form-check text-start">
            	<input class="form-check-input" type="checkbox" name="simboli" checked>
            	<label class="form-check-label">Simboli</label>
          	</div>
        		<button class="btn btn-dark mt-3 w-100">Genera</button>
          </form>
        </div>
      </div>
    </div>
	</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>  
</body>
</html>