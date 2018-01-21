<?php

define("TOKEN_WHEELMAP", "Wjqc8yX1XJAFGsUomsLu");

// in base al luogo e all'operazione da eseguire la funzione fa una richesta di tipo http ai server di
// wheelmap per ricevere i dati da elaborare
function richiestaWheelmapCompleta($luogo, $operazione)
{
	$token_api_wheelmap = Wjqc8yX1XJAFGsUomsLu; 
	switch($operazione)
    {
    	case 1:
         	$url = 'https://wheelmap.org/api/nodes/search?api_key='.urlencode(TOKEN_WHEELMAP).'&q='.urlencode($luogo);
        	break;
        case 2:
        	$url = 'https://wheelmap.org/api/categories/1/nodes/search?api_key='.urlencode(TOKEN_WHEELMAP).'&q='.urlencode($luogo);
        	break;
        case 3:
        	$url = 'https://wheelmap.org/api/categories/2/nodes/search?api_key='.urlencode(TOKEN_WHEELMAP).'&q='.urlencode($luogo);
        	break;
        case 4:
        	$url = 'https://wheelmap.org/api/categories/3/nodes/search?api_key='.urlencode(TOKEN_WHEELMAP).'&q='.urlencode($luogo);
        	break;
        case 5:
        	$url = 'https://wheelmap.org/api/categories/4/nodes/search?api_key='.urlencode(TOKEN_WHEELMAP).'&q='.urlencode($luogo);
        	break;
        case 6:
        	$url = 'https://wheelmap.org/api/categories/5/nodes/search?api_key='.urlencode(TOKEN_WHEELMAP).'&q='.urlencode($luogo);
        	break;
        case 7:
        	$url = 'https://wheelmap.org/api/categories/6/nodes/search?api_key='.urlencode(TOKEN_WHEELMAP).'&q='.urlencode($luogo);
        	break;
        case 8:
        	$url = 'https://wheelmap.org/api/categories/7/nodes/search?api_key='.urlencode(TOKEN_WHEELMAP).'&q='.urlencode($luogo);
        	break;
        case 9:
        	$url = 'https://wheelmap.org/api/categories/8/nodes/search?api_key='.urlencode(TOKEN_WHEELMAP).'&q='.urlencode($luogo);
        	break;
        case 10:
        	$url = 'https://wheelmap.org/api/categories/9/nodes/search?api_key='.urlencode(TOKEN_WHEELMAP).'&q='.urlencode($luogo);
        	break;
        case 11:
        	$url = 'https://wheelmap.org/api/categories/10/nodes/search?api_key='.urlencode(TOKEN_WHEELMAP).'&q='.urlencode($luogo);
        	break;
        case 12:
        	$url = 'https://wheelmap.org/api/categories/11/nodes/search?api_key='.urlencode(TOKEN_WHEELMAP).'&q='.urlencode($luogo);
        	break;
        case 13:
        	$url = 'https://wheelmap.org/api/categories/12/nodes/search?api_key='.urlencode(TOKEN_WHEELMAP).'&q='.urlencode($luogo);
        	break;
        case 14:
        	$url = 'https://wheelmap.org/api/nodes/search?api_key='.urlencode(TOKEN_WHEELMAP).'&q='.urlencode($luogo).'&wheelchair=yes';
        	break;
        case 15:
        	$url = 'https://wheelmap.org/api/nodes/search?api_key='.urlencode(TOKEN_WHEELMAP).'&q='.urlencode($luogo).'&wheelchair=limited';
            break;
	}
    $curl = curl_init($url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $risposta = curl_exec($curl);
    $dati = json_decode($risposta,true);
    return $dati;
}

// funzione che prende l'id categoria e restituisce la stringa tradotta in italiano
function traduciCategoria($id_categoria)
{
	$curl = curl_init('https://wheelmap.org/api/categories?api_key='.urlencode(TOKEN_WHEELMAP).'&locale=it');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $risposta = curl_exec($curl);
    $dati = json_decode($risposta,true);
    $j = $dati['meta']['item_count_total'];
    for($i = 0; $i<$j; $i++)
	{
    	if($dati['categories'][$i]['id'] == $id_categoria)
        {
        	$categoria_tradotta = $dati['categories'][$i]['localized_name'];
        }
    }
    return $categoria_tradotta;
}

// prende lo stato di accessibilità in inglese e riporta la traduzione italiana
function tipoWheelchair($wheel)
{
	if($wheel == "yes")
    {
    	$stringa = "Sì";
	}else if($wheel == "no")
    {
    	$stringa = "No";
    }else if($wheel == "unknown")
    {
    	$stringa = "Sconosciuto";
    }else if($wheel == "limited")
    {
    	$stringa = "Limitato";
    }else{
    	$stringa = "Sconosciuto";
    }
    return $stringa;
}

// funzione che prende l'id tipo_nodo cioè il tipo di attività
// e restituisce la stringa tradotta in italiano
function traduciNodeTypes($id_node_types)
{
$token_wheelmap = 'Wjqc8yX1XJAFGsUomsLu';
	$curl = curl_init('https://wheelmap.org/api/node_types?api_key='.urlencode(TOKEN_WHEELMAP).'&locale=it');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $risposta = curl_exec($curl);
    $dati = json_decode($risposta,true);
    $j = $dati['meta']['item_count'];
    for($i = 0; $i < $j; $i++)
	{
    	if($dati['node_types'][$i]['id'] == $id_node_types)
        {
        	$categoria_tradotta = $dati['node_types'][$i]['localized_name'];
        }
    }
    return $categoria_tradotta;
}

// funzione che in base ai dati ricevuti da wheelmap restituisce una stringa con informazioni sui luoghi
// da inviare all'utente telegram
function resultTextfromDati($dati, $i)
{
 	$nome = 'Nome: '.$dati['nodes'][$i]['name'];
   	$wheel = 'Accesso: '.tipoWheelchair($dati['nodes'][$i]['wheelchair']);
   	$category = 'Categoria: '.traduciCategoria($dati['nodes'][$i]['category']['id']);
    $strada = 'Indirizzo: '.$dati['nodes'][$i]['street'].' '.$dati['nodes'][$i]['housenumber'];
    $node_type = 'Tipo attività: '.traduciNodeTypes($dati['nodes'][$i]['node_type']['id']);
  	$text = $nome.PHP_EOL.$wheel.PHP_EOL.$category.PHP_EOL.$node_type.PHP_EOL.$strada;
    return $text;
}

// funzione che ricava la latitudine e longitudine dei luoghi di wheelmap e ritorna una
// stringa con le informazioni
function resultLocation($dati, $i)
{
  	$lat = $dati['nodes'][$i]['lat'];
    $lon = $dati['nodes'][$i]['lon'];
    $location = '&latitude='.$lat.'&longitude='.$lon;
    return $location;
}

?>
