<?php
/**
 *   File functions:
 *  Site footer, close gzip compression, show players list
 *
 *   @name                 : foot.php
 *   @copyright            : (C) 2004,2005,2006 Vallheru Team based on Gamers-Fusion ver 2.5
 *   @author               : thindil <thindil@users.sourceforge.net>
 *   @author               : eyescream <tduda@users.sourceforge.net>
 *   @version              : 1.4
 *   @since                : 15.07.2007
 *
 */

//
//
//       This program is free software; you can redistribute it and/or modify
//   it under the terms of the GNU General Public License as published by
//   the Free Software Foundation; either version 2 of the License, or
//   (at your option) any later version.
//
//   This program is distributed in the hope that it will be useful,
//   but WITHOUT ANY WARRANTY; without even the implied warranty of
//   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//   GNU General Public License for more details.
//
//   You should have received a copy of the GNU General Public License
//   along with this program; if not, write to the Free Software
//   Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
//
// $Id$

/**
* Get the localization for game and security file.
*/
require_once('languages/'.$player -> lang.'/foot.php');
require_once('includes/security.php');

$db->SetFetchMode(ADODB_FETCH_NUM);
$arrCount = $db -> GetRow('SELECT count(*) FROM `players`');


/**
* Show record in game
*/
include('counter/record.php');
/**
* Count time to reset
*/
require_once('includes/counttime.php');
$arrTime = counttime();

$arrAge = $db -> GetRow('SELECT `value` FROM `settings` WHERE `setting`=\'age\'');
$arrDay = $db -> GetRow('SELECT `value` FROM `settings` WHERE `setting`=\'day\'');
$time = date("H:i:s");

/**
* Last registered
*/
require_once('last.php');
$last = eyeLastRegistered();


# Nie chce mi się dłużej myśleć, jak napisać swój skrypt w javascripcie,
# więc użyję "brudnej" wersji → na początek ściągnę sobie listę zalogowanych jsonem.

// create a new cURL resource
$ch = curl_init();

$onlinelist = "http://";
$onlinelist.= $gameadress;
$onlinelist.= "/onlinelist.php";

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, $onlinelist);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //Nie outputuj wyniku

// grab URL and pass it to the browser
$json = curl_exec($ch);

// close cURL resource, and free up system resources
curl_close($ch);

#Tutaj liczem plejersuf
$data = json_decode($json, true);
$graczki = $data['info']; //wczytaj graczy
$tela = $data['Online'][0]; //ile zalogowanych graczy ?

    # To tak na przyszłość, dane ściągam z onlinelist.php,
    # a trzymam w includes/head
    #foreach ($data['players'] as $key=>$val) {
    #    echo $val['rasa'];
    #}

    #$rasa = $graczki['rasa']; //przykładowe użycie

    $smarty->assign('tela', $tela);
    $smarty->assign('foo', $graczki);

/**
* Last poll
*/
$lastPoll = $db->GetRow('SELECT `poll`, `days` FROM `polls` WHERE `votes` < 0 ORDER BY `id` DESC LIMIT 1');
if ($player -> poll == 'Y' or $lastPoll[1] <= 0) { // czy gracz już głosował, czy ankieta jest aktywna
            $lastPoll= ''; //nie ma ankiety do głosowania
}

$CPU =  $perf->cpuLoad();
$db -> LogSQL(false);
list($a_dec, $a_sec) = explode(' ', $start_time);
list($b_dec, $b_sec) = explode(' ', microtime());
$arrSQL = $db -> GetRow('SELECT SUM(`timer`), count(*) FROM `adodb_logsql`');
$sqltime = round($arrSQL[0], 3);
$duration = round($b_sec - $a_sec + $b_dec - $a_dec, 3);
$db -> Execute('TRUNCATE TABLE `adodb_logsql`');

$comp = isset($compress) ? YES : NO;
if (!isset($do_gzip_compress)) {
    $do_gzip_compress = false;
}

/**
* Assign variables and show page
*/
$pageNr = (isset($_SESSION['page'])) ? $_SESSION['page'] : 0;
$opisInList = (isset($_SESSION['opisinlist'])) ? $_SESSION['opisinlist'] : 0;
$smarty -> assign(array('Players' => $arrCount[0],
                        'Overlib' => $player -> overlib,
                        'OpisInList' => $opisInList,
                        'Page' => $pageNr,
                        'Mailinfo' => $player -> mailinfo,
                        'Loginfo' => $player -> loginfo,
                        'LastID' => $last[0],
                        'LastName' => $last[1],
                        'LastPollMenu' =>  $lastPoll[0],
                        'CPU' => $CPU,
                        'Duration' => $duration,
                        'Compress' => $comp,
                        'Sqltime' => $sqltime,
                        'numRecord' => $record,
                        'Numquery' => $arrSQL[1] + 1,
                        'Tage' => $arrAge[0],
                        'Tday' => $arrDay[0],
                        'Thours' => $arrTime[0],
                        'Tminutes' => $arrTime[1],
                        'Time' => $time
                        ));

$smarty -> display('footer.tpl');

if ($do_gzip_compress) {
    //
    // Borrowed from php.net!
    //
    $gzip_contents = ob_get_contents();
    ob_end_clean();
    $gzip_size = strlen($gzip_contents);
    $gzip_crc = crc32($gzip_contents);
    $gzip_contents = gzcompress($gzip_contents, 9);
    $gzip_contents = substr($gzip_contents, 0, strlen($gzip_contents) - 4);

    echo '\x1f\x8b\x08\x00\x00\x00\x00\x00'.$gzip_contents.pack('V', $gzip_crc).pack('V', $gzip_size);
}
$db -> Close();
session_write_close();
