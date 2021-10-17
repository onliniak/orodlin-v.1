<?php

if(!is_file("counter/licznik.php")){
    mkdir("counter");
    chdir("counter");
    touch("licznik.php");
    touch("d_licznik.php");
}

/*licznik*/
    include("counter/licznik.php");
    $akt = $ilosc;
    include("counter/d_licznik.php");
    $akt2 = $ilosc;
/*kuniec licznika*/

$smarty->assign(array('Logcount' => $akt,
	'Logcountday' => $akt2));

?>
