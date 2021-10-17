<?php
function GetLang()
{
    global $_SERVER;
    global $_GET;
    global $arrLanguage;
    global $strTranslation;

    /**
    * Check avaible languages
    */

    $path = 'languages/';
    $dir = opendir($path);
    $arrLanguage = array();
    $i = 0;
    while ($file = readdir($dir)) {
        if (!preg_match("/.htm*$/", $file)) {
            if (!preg_match("/\.$/", $file)) {
                $arrLanguage[$i] = $file;
                $i = $i + 1;
            }
        }
    }
    closedir($dir);

    /**
    * Get the localization for game
    */
    $strLanguage = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
    foreach ($arrLanguage as $strTrans) {
        #$strSearch = "^".$strTrans;
        if (strpos($strTrans, $strLanguage)) {
            $strTranslation = $strTrans;
            break;
        }
    }
    if (!isset($strTranslation)) {
        $strTranslation = 'pl';
    }
    if (isset($_GET['lang'])) {
        if (in_array($_GET['lang'], $arrLanguage)) {
            $strTranslation = $_GET['lang'];
        }
    }

    return $strTranslation;
}

function GetLoc($name, $lang = '')
{
    if (!strpos($name, '.php')) {
        $name .= '.php';
    }

    if ($lang == '') {
        global $strTranslation;
        $lang = $strTranslation;
    }

    require_once('languages/'.$lang.'/'.$name);
}
