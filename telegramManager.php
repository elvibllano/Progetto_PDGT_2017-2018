<?php

define('URL', 'https://api.telegram.org/bot387262509:AAFfGgvwpm9Wb1GSvIqxDV6HfsMPbZ9GHL0/');

// Funzione che manda il messagi all'utente
function sendMessage($updates, $text)
{
  $curl = curl_init(URL.'sendMessage?chat_id=' . $updates['message']['chat']['id'] . '&text='.urlencode($text));
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_exec($curl);
}

// funzione che manda le coordinate all'utente
function sendLocation($updates, $location)
{
  $curl = curl_init(URL.'sendlocation?chat_id='.$updates['message']['chat']['id'].$location);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
  curl_exec($curl);	
}

?>
