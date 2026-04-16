<?php

function processaGenerazionePassword() {
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
}

function generaPassword($lunghezza, $usaMinuscole, $usaMaiuscole, $usaNumeri, $usaSimboli) {
	
$caratteri = '';
	if ($usaMinuscole) {
    $caratteri .= 'abcdefghijklmnopqrstuvwxyz';
  }
  if ($usaMaiuscole) {
    $caratteri .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  }
  if ($usaNumeri) {
    $caratteri .= '0123456789';
  }
  if ($usaSimboli) {
    $caratteri .= '!@#$%^&*()-_=+[]{}<>?';
  }
	if ($caratteri === '') {
    return null; // nessun set selezionato
  }
	
	$password = '';
	for ($i = 0; $i < $lunghezza; $i++) {
    $password .= $caratteri[random_int(0, strlen($caratteri) - 1)];
  }

    return $password;
}