<?php
//ajax initialization
header('Content-type:application/json;charset=utf-8');

require_once('includes/config.php');

$sql2 = " FROM `players`";
$sql4 = " WHERE `players`.`lpv` >=".(time() - 180); // co 3 minuty sprawdź, czy ktoś ostatnio odświeżał stronę, jak tak to policz

$db->setFetchMode(ADODB_FETCH_NUM); //A tutaj nie chcę
$playersOnline = $db -> getRow("SELECT count(*) ".$sql2.$sql4);

$db->setFetchMode(ADODB_FETCH_ASSOC); //Tutaj chcę, żeby pokazało [id], [user] itp …
$gracze = $db->getAll("SELECT `id`, `user`, `rank`, `avatar`, `opis` ".$sql2.$sql4);
$fabularnie = $db->getAll("SELECT `rasa`, `klasa`, `gender`, `age`, `page` ".$sql2.$sql4);
$przechwałki = $db->getAll("SELECT `level`, `tribe`, `tribe_rank`, `miejsce` ".$sql2.$sql4);
$rzadkie = $db->getAll("SELECT `wins`, `losses`, `immu` ".$sql2.$sql4);

$array = array(
    'info' => $gracze, //możemy mieć max 5 elementów w arrayu
    'fabularnie' => $fabularnie,
    'przechwałki' => $przechwałki,
    'pozostałe' => $rzadkie,
    'Online' => $playersOnline
);

echo json_encode($array);

#require_once('includes/json.php');
#$jsonlist =  new Services_JSON();
#$smarty -> assign('Reply', $jsonlist -> encode($arrReply));
#$smarty -> display('onlinelist.tpl');
