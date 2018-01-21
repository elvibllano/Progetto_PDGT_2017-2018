<html>
    <head>
        <title>Benvenuto</title>
    </head>
    <body>
        <div align=”center”>Hello World!</div>
    </body>
</html>

<?php

include 'wheelmapManager.php';
include 'telegramManager.php';

$content = file_get_contents('php://input');
$updates = json_decode($content, TRUE);
$message = $updates['message']['text'];


// comando cercaluogo che restituisce lista di punti con info e coordinate in base al luogo inserito
if(strstr($message,' ',true) == '/cercaluogo')
{
    $dati = richiestaWheelmapCompleta(strstr($message,' '), 1);
    $j = $dati['meta']['item_count'];
    if($j==0)
    {
    	$text = 'Non ci sono informazioni per questa categoria.';
    	sendMessage($updates,$text);
    }
	for($i = 0; $i < $j; $i++)
	{
         $text = resultTextfromDati($dati, $i);
         $location = resultLocation($dati, $i);
         sendMessage($updates,$text);
         sendLocation($updates,$location);
	}
}

// comando che restituisce lista di punti appartenenti alla categoria Trasporto pubblico
// con info e coordinate in base al luogo inserito
else if(strstr($message,' ',true) == '/cercaluogo1')
{
    $dati = richiestaWheelmapCompleta(strstr($message,' '), 2);
    $j = $dati['meta']['item_count'];
    if($j==0)
    {
    	$text = 'Non ci sono informazioni per questa categoria.';
    	sendMessage($updates,$text);
    }
	for($i = 0; $i < $j; $i++)
	{
		 $text = resultTextfromDati($dati, $i);
         $location = resultLocation($dati, $i);
         sendMessage($updates,$text);
         sendLocation($updates,$location);
	}
}

// comando che restituisce lista di punti appartenenti alla categoria Alimenti
// con info e coordinate in base al luogo inserito
else if(strstr($message,' ',true) == '/cercaluogo2')
{
    $dati = richiestaWheelmapCompleta(strstr($message,' '), 3);
    $j = $dati['meta']['item_count'];
    if($j==0)
    {
    	$text = 'Non ci sono informazioni per questa categoria.';
    	sendMessage($updates,$text);
    }
	for($i = 0; $i < $j; $i++)
	{
		 $text = resultTextfromDati($dati, $i);
         $location = resultLocation($dati, $i);
         sendMessage($updates,$text);
         sendLocation($updates,$location);
	}
}
// comando che restituisce lista di punti appartenenti alla categoria Tempo libero
// con info e coordinate in base al luogo inserito
else if(strstr($message,' ',true) == '/cercaluogo3')
{
    $dati = richiestaWheelmapCompleta(strstr($message,' '), 4);
    $j = $dati['meta']['item_count'];
    if($j==0)
    {
    	$text = 'Non ci sono informazioni per questa categoria.';
    	sendMessage($updates,$text);
    }
	for($i = 0; $i < $j; $i++)
	{
		 $text = resultTextfromDati($dati, $i);
         $location = resultLocation($dati, $i);
         sendMessage($updates,$text);
         sendLocation($updates,$location);
    }
}
// comando che restituisce lista di punti appartenenti alla categoria Banca/Posta
// con info e coordinate in base al luogo inserito
else if(strstr($message,' ',true) == '/cercaluogo4')
{
    $dati = richiestaWheelmapCompleta(strstr($message,' '), 5);
    $j = $dati['meta']['item_count'];
    if($j==0)
    {
    	$text = 'Non ci sono informazioni per questa categoria.';
    	sendMessage($updates,$text);
    }
	for($i = 0; $i < $j; $i++)
	{
		 $text = resultTextfromDati($dati, $i);
         $location = resultLocation($dati, $i);
         sendMessage($updates,$text);
         sendLocation($updates,$location);
    }
}
// comando che restituisce lista di punti appartenenti alla categoria Educazione
// con info e coordinate in base al luogo inserito
else if(strstr($message,' ',true) == '/cercaluogo5')
{
    $dati = richiestaWheelmapCompleta(strstr($message,' '), 6);
    $j = $dati['meta']['item_count'];
    if($j==0)
    {
    	$text = 'Non ci sono informazioni per questa categoria.';
    	sendMessage($updates,$text);
    }
	for($i = 0; $i < $j; $i++)
	{
		 $text = resultTextfromDati($dati, $i);
         $location = resultLocation($dati, $i);
         sendMessage($updates,$text);
         sendLocation($updates,$location);
    }
}
// comando che restituisce lista di punti appartenenti alla categoria Shopping
// con info e coordinate in base al luogo inserito
else if(strstr($message,' ',true) == '/cercaluogo6')
{
    $dati = richiestaWheelmapCompleta(strstr($message,' '), 7);
    //$dati = richiestaWheelmap('https://wheelmap.org/api/categories/6/nodes/search?api_key=Wjqc8yX1XJAFGsUomsLu&q=Urbino');
    $j = $dati['meta']['item_count'];
    if($j==0)
    {
    	$text = 'Non ci sono informazioni per questa categoria.';
    	sendMessage($updates,$text);
    }
	for($i = 0; $i < $j; $i++)
	{
    	 $text = resultTextfromDati($dati, $i);
         $location = resultLocation($dati, $i);
         sendMessage($updates,$text);
         sendLocation($updates,$location);
    }
}
// comando che restituisce lista di punti appartenenti alla categoria Sport
// con info e coordinate in base al luogo inserito
else if(strstr($message,' ',true) == '/cercaluogo7')
{
    $dati = richiestaWheelmapCompleta(strstr($message,' '), 8);
    //$dati = richiestaWheelmap('https://wheelmap.org/api/categories/7/nodes/search?api_key=Wjqc8yX1XJAFGsUomsLu&q=Urbino');
    $j = $dati['meta']['item_count'];
    if($j==0)
    {
    	$text = 'Non ci sono informazioni per questa categoria.';
    	sendMessage($updates,$text);
    }
	for($i = 0; $i < $j; $i++)
	{
		 $text = resultTextfromDati($dati, $i);
         $location = resultLocation($dati, $i);
         sendMessage($updates,$text);
         sendLocation($updates,$location);
    }
}
// comando che restituisce lista di punti appartenenti alla categoria Turismo
// con info e coordinate in base al luogo inserito
else if(strstr($message,' ',true) == '/cercaluogo8')
{
    $dati = richiestaWheelmapCompleta(strstr($message,' '), 9);
    $j = $dati['meta']['item_count'];
    if($j==0)
    {
    	$text = 'Non ci sono informazioni per questa categoria.';
    	sendMessage($updates,$text);
    }
	for($i = 0; $i < $j; $i++)
	{
		 $text = resultTextfromDati($dati, $i);
         $location = resultLocation($dati, $i);
         sendMessage($updates,$text);
         sendLocation($updates,$location);
    }
}
// comando che restituisce lista di punti appartenenti alla categoria Alloggi
// con info e coordinate in base al luogo inserito
else if(strstr($message,' ',true) == '/cercaluogo9')
{
    $dati = richiestaWheelmapCompleta(strstr($message,' '), 10);
    $j = $dati['meta']['item_count'];
    if($j==0)
    {
    	$text = 'Non ci sono informazioni per questa categoria.';
    	sendMessage($updates,$text);
    }
	for($i = 0; $i < $j; $i++)
	{
		 $text = resultTextfromDati($dati, $i);
         $location = resultLocation($dati, $i);
         sendMessage($updates,$text);
         sendLocation($updates,$location);
    }
}
// comando che restituisce lista di punti appartenenti alla categoria Vari
// con info e coordinate in base al luogo inserito
else if(strstr($message,' ',true) == '/cercaluogo10')
{
    $dati = richiestaWheelmapCompleta(strstr($message,' '), 11);
    $j = $dati['meta']['item_count'];
    if($j==0)
    {
    	$text = 'Non ci sono informazioni per questa categoria.';
    	sendMessage($updates,$text);
    }
	for($i = 0; $i < $j; $i++)
	{
		 $text = resultTextfromDati($dati, $i);
         $location = resultLocation($dati, $i);
         sendMessage($updates,$text);
         sendLocation($updates,$location);
    }
}
// comando che restituisce lista di punti appartenenti alla categoria Governo
// con info e coordinate in base al luogo inserito
else if(strstr($message,' ',true) == '/cercaluogo11')
{
    $dati = richiestaWheelmapCompleta(strstr($message,' '), 12);
    $j = $dati['meta']['item_count'];
    if($j==0)
    {
    	$text = 'Non ci sono informazioni per questa categoria.';
    	sendMessage($updates,$text);
    }
    for($i = 0; $i < $j; $i++)
	{
		 $text = resultTextfromDati($dati, $i);
         $location = resultLocation($dati, $i);
         sendMessage($updates,$text);
         sendLocation($updates,$location);
    }
}
// comando che restituisce lista di punti appartenenti alla categoria Salute
// con info e coordinate in base al luogo inserito
else if(strstr($message,' ',true) == '/cercaluogo12')
{
    $dati = richiestaWheelmapCompleta(strstr($message,' '), 13);
    $j = $dati['meta']['item_count'];
    if($j==0)
    {
    	$text = 'Non ci sono informazioni per questa categoria.';
    	sendMessage($updates,$text);
    }
    for($i = 0; $i < $j; $i++)
	{
		 $text = resultTextfromDati($dati, $i);
         $location = resultLocation($dati, $i);
         sendMessage($updates,$text);
         sendLocation($updates,$location);
    }
}
// comando che restituisce lista di punti che hanno accessibilità completa
// con info e coordinate in base al luogo inserito
else if(strstr($message,' ',true) == '/cercaluogoy')
{
    $dati = richiestaWheelmapCompleta(strstr($message,' '), 14);
    $j = $dati['meta']['item_count'];
    if($j==0)
    {
    	$text = 'Non ci sono informazioni per questa categoria.';
    	sendMessage($updates,$text);
    }
	for($i = 0; $i < $j; $i++)
	{
		 $text = resultTextfromDati($dati, $i);
         $location = resultLocation($dati, $i);
         sendMessage($updates,$text);
         sendLocation($updates,$location);
	}
}

// comando che avvia il bot e restituisce un messaggio con varie informazioni sul bot
else if($message=='/start')
{
	$text = 'Benvenuto, '.PHP_EOL.
            'questo bot Telegram è stato sviluppato da Elvi Bllano come progetto per il corso di Piattaforme Digitali per la Gestione del Territorio, indirizzo di Informatica Applicata dell\'Università di Urbino.'.PHP_EOL.
            'Lo scopo del bot è quello di fornire indicazioni sull\'accessibilità di posti e attività della città per le persone con disabilità o mobilità ristretta.'.EOL_PHP.
            'Il codice del bot è accessibile dal link GitHub https://github.com/elvibllano/Progetto_PDGT_2017-2018';
    sendMessage($updates,$text);
}

// comando che mostra la lista dei comandi del bot
else if($message=='/help')
{
	$text = 'Questi sono i comandi da usare:'.PHP_EOL.
    	     '/help Mostra la lista dei comandi'.PHP_EOL.
             '/cercaluogo <luogo> Cerca informazioni generali in base al luogo inserito dall\'utente'.PHP_EOL.
             '/cercaluogoy <luogo> Cerca informazioni generali del luogo inserito e mostra solo i punti che hanno accessibilità completa'.PHP_EOL.
             '/cercaluogol <luogo> Cerca informazioni generali del luogo inserito e mostra solo i punti che hanno accessibilità limitata'.PHP_EOL.
             '/cercaluogo<numero categoria> <luogo> Cerca informazioni in base alla categoria del luogo inserito'.PHP_EOL.
             'Categorie:'.PHP_EOL.
              '1.  Trasporto pubblico'.PHP_EOL.
              '2.  Alimenti'.PHP_EOL.
              '3.  Tempo libero'.PHP_EOL.
              '4.  Banca/Posta'.PHP_EOL.
              '5.  Educazione'.PHP_EOL.
              '6.  Shopping'.PHP_EOL.
              '7.  Sport'.PHP_EOL.
              '8.  Turismo'.PHP_EOL.
              '9.  Alloggi'.PHP_EOL.
              '10. Vari'.PHP_EOL.
              '11. Governo'.PHP_EOL.
              '12. Salute'.PHP_EOL;
     sendMessage($updates,$text);
}

// se l'utente manda il comando senza la città da cercare restituisce un messaggio che 
// l'utente che deve aggiungere anche il nome in seguito al comando
else if($message=='/cercaluogo'||
        $message=='/cercaluogo1'||
   		$message=='/cercaluogo2'||
  		$message=='/cercaluogo3'||
   		$message=='/cercaluogo4'||
   		$message=='/cercaluogo5'||
   		$message=='/cercaluogo6'||
   		$message=='/cercaluogo7'||
   		$message=='/cercaluogo8'||
   		$message=='/cercaluogo9'||
   		$message=='/cercaluogo10'||
   		$message=='/cercaluogo11'||
   		$message=='/cercaluogo12'||
   		$message=='/cercaluogoy'||
        $message=='/cercaluogol')
   {
   		$text = 'Prego inserire anche la città nel comando';
   		sendMessage($updates,$text);
   }
// comando che restituisce lista di punti che hanno accessibilità limitata
// con info e coordinate in base al luogo inserito
else if(strstr($message,' ',true) == '/cercaluogol')
{
    $dati = richiestaWheelmapCompleta(strstr($message,' '), 15);
    $j = $dati['meta']['item_count'];
    if($j==0)
    {
    	$text = 'Non ci sono informazioni per questa categoria.';
    	sendMessage($updates,$text);
    }
	for($i = 0; $i < $j; $i++)
	{
		 $text = resultTextfromDati($dati, $i);
         $location = resultLocation($dati, $i);
         sendMessage($updates,$text);
         sendLocation($updates,$location);
    }
}
else
{
	$text = 'Comando non riconosciuto.';
	sendMessage($updates,$text);
}
?>