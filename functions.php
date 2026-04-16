<?php

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