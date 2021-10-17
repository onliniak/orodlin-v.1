<?php
require_once('adodb/adodb.inc.php');

$driver = 'mysqli';
$host = 'adres_bazy';
$user = 'user_gry';
$password = 'haslo';
$database = 'nazwa_bazy_danych';
$db = NewADOConnection($driver);
//podajemy namiary na baz� danych: adres, user, haslo, nazwa
$db -> Connect($host, $user, $password, $database);
$db -> Execute("SET NAMES utf8");
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
$ADODB_CACHE_DIR = 'cache';
$gamename= "Nazwa_gry";
$gamemail = "mejl_gry";
//tutaj musimy konicznie poda� adres pod kt�rym dost�pna b�dzie gra
//bez pocz�tkowego http:// i ko�cowego /
//zazwyczaj b�dzie to "localhost" lub "localhost/orodlin"
$gameadress = "localhost/orodlin";
$adminname = "";
$adminmail = "";
$city1 = "123";
$city1a = "123";
$city1b = "123";
$city2 = "321";
$pllimit = 50;
