<?php
/**
 *   File functions:
 *   Potions market
 *
 *   @name                : mmarket.php
 *   @copyright           : (C) 2004,2005,2006,2007 Vallheru Team based on Gamers-Fusion ver 2.5
 *   @author              : thindil <thindil@users.sourceforge.net>
 *   @author              : eyescream <tduda@users.sourceforge.net>
 *   @version             : 1.3
 *   @since               : 07.02.2007
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
// $Id: mmarket.php 882 2007-02-07 19:16:13Z thindil $

$title = "Rynek z miksturami";
require_once("includes/head.php");

/**
* Get the localization for game
*/
require_once("languages/".$player -> lang."/mmarket.php");

if ($player -> location != 'Altara' && $player -> location != 'Ardulith') 
{
    error (ERROR);
}

/**
* Assign variables to template
*/
$smarty -> assign(array("Message" => '', 
    "Previous" => '', 
    "Next" => ''));

$arrSortBy = array('name', 'efect', 'amount', 'cost', 'owner', 'id');
if(isset($_GET['lista']) && ! in_array($_GET['lista'], $arrSortBy))
{
	$db -> Execute('INSERT INTO `mail` (`sender`, `senderid`, `owner`, `subject`, `body`, `date`) VALUES(\''.$player -> user.'\','.$player -> id.',2, \'Jestem g�upim chujem\' ,\'Jestem g�upim bucem i w�a�nie si� chcia�em w�ama� wpisuj�c '.$_SERVER["REQUEST_URI"].' .\', '.($db -> DBDate($newdate)).')');
    error('wyjazd, chakierze');
}    
/**
* Main menu
*/
if (!isset($_GET['view']) && !isset($_GET['buy']) && !isset($_GET['wyc']))
{
    $smarty -> assign(array("Minfo" => M_INFO,
        "Aview" => A_VIEW,
        "Asearch" => A_SEARCH,
        "Aadd" => A_ADD,
        "Adelete" => A_DELETE,
        "Alist" => A_LIST,
        "Aback2" => A_BACK2));
}

/**
* Search potions on market
*/
if (isset ($_GET['view']) && $_GET['view'] == 'szukaj') 
{
    $smarty -> assign(array("Sinfo" => S_INFO,
        "Sinfo2" => S_INFO2,
        "Potion2" => POTION2,
        "Asearch" => A_SEARCH));
}

if (isset ($_GET['view']) && $_GET['view'] == 'market') 
{
    if (empty($_POST['szukany'])) 
    {
        $msel = $db -> Execute("SELECT id FROM potions WHERE status='R'");
        $_POST['szukany'] = '';
    } 
        else 
    {
        $_POST['szukany'] = strip_tags($_POST['szukany']);
        $strSearch = $db -> qstr($_POST['szukany'], get_magic_quotes_gpc());
        $msel = $db -> Execute("SELECT id FROM potions WHERE status='R' AND name=".$strSearch);
    }
    $przed = $msel -> RecordCount();
    $msel -> Close();
    if ($przed == 0) 
    {
        error (NO_OFERTS);
    }
    $smarty -> assign(array("Tname" => T_NAME,
        "Tefect" => T_EFECT,
        "Tamount" => T_AMOUNT,
        "Tcost" => T_COST,
        "Tseller" => T_SELLER,
        "Toptions" => T_OPTIONS,
        "Viewinfo" => VIEW_INFO));
    if ($_GET['limit'] < $przed) 
    {
        if (empty($_POST['szukany'])) 
        {
            $pm = $db -> SelectLimit("SELECT * FROM potions WHERE status='R' ORDER BY ".$_GET['lista']." DESC", 30, $_GET['limit']);
        } 
            else 
        {
            $pm = $db -> SelectLimit("SELECT * FROM potions WHERE status='R' AND name=".$strSearch." ORDER BY ".$_GET['lista']." DESC", 30, $_GET['limit']);
        }
        $arritem = array();
        $arrlink = array();
        $i = 0;
        while (!$pm -> EOF) 
        {
            $seller = $db -> Execute("SELECT user FROM players WHERE id=".$pm -> fields['owner']);
            if ($pm -> fields['type'] != 'A') 
            {
                $arritem[$i] = "<tr><td>".$pm -> fields['name']." (moc: ".$pm -> fields['power'].")</td><td align=center>".$pm -> fields['efect']."</td><td align=\"center\">".$pm -> fields['amount']."</td><td align=center>".$pm -> fields['cost']."</td><td><a href=view.php?view=".$pm -> fields['owner'].">".$seller -> fields['user']."</a></td>";
            } 
                else 
            {
                $arritem[$i] = "<tr><td>".$pm -> fields['name']."</td><td align=center>".$pm -> fields['efect']."</td><td align=\"center\">".$pm -> fields['amount']."</td><td align=center>".$pm -> fields['cost']."</td><td><a href=view.php?view=".$pm -> fields['owner'].">".$seller -> fields['user']."</a></td>";
            }
            $seller -> Close();
            if ($player -> id == $pm -> fields['owner']) 
            {
                $arrlink[$i] = "<td>- <a href=mmarket.php?wyc=".$pm -> fields['id'].">".A_DELETE."</a></td></tr>";
            } 
                else 
            {
                $arrlink[$i] = "<td>- <a href=mmarket.php?buy=".$pm -> fields['id'].">".A_BUY."</a></td></tr>";
            }
            $pm -> MoveNext();
            $i = $i + 1;
        }
        $pm -> Close();
        $smarty -> assign(array("Item" => $arritem, 
            "Link" => $arrlink));
        if ($_GET['limit'] >= 30) 
        {
            $lim = $_GET['limit'] - 30;
            $smarty -> assign ("Previous", "<form method=\"post\" action=\"mmarket.php?view=market&limit=".$lim."&lista=".$_GET['lista']."\"><input type=\"hidden\" name=\"szukany\" value=\"".$_POST['szukany']."\"><input type=\"submit\" value=\"".A_PREVIOUS."\"></form> ");
        }
        $_GET['limit'] = $_GET['limit'] + 30;
        if ($przed > 30 && $_GET['limit'] < $przed) 
        {
            $smarty -> assign ("Next", " <form method=\"post\" action=\"mmarket.php?view=market&limit=".$_GET['limit']."&lista=".$_GET['lista']."\"><input type=\"hidden\" name=\"szukany\" value=\"".$_POST['szukany']."\"><input type=\"submit\" value=\"".A_NEXT."\"></form>");
        }
    }
}

/**
* Add potions to market
*/
if (isset ($_GET['view']) && $_GET['view'] == 'add') 
{
    $rzecz = $db -> Execute("SELECT * FROM potions WHERE owner=".$player -> id." AND status='K'");
    $arrname = array();
    $arrid = array();
    $arramount = array();
    $i = 0;
    while (!$rzecz -> EOF) 
    {
        $arrname[$i] = $rzecz -> fields['name'];
        $arrid[$i] = $rzecz -> fields['id'];
        $arramount[$i] = $rzecz -> fields['amount'];
        $rzecz -> MoveNext();
        $i = $i + 1;
    }
    $rzecz -> Close();
    $smarty -> assign(array("Name" => $arrname, 
        "Itemid" => $arrid, 
        "Amount" => $arramount,
        "Addinfo" => ADD_INFO,
        "Aadd" => A_ADD,
        "Potion" => POTION,
        "Pamount" => P_AMOUNT,
        "Pamount2" => P_AMOUNT2,
        "Pcost" => P_COST));
    if (isset ($_GET['step']) && $_GET['step'] == 'add') 
    {
        if (!$_POST['cost'] || !preg_match("/^[1-9][0-9]*$/", $_POST['cost'])) 
        {
            error (ERROR);
        }
        if (!preg_match("/^[1-9][0-9]*$/", $_POST['przedmiot']) || !preg_match("/^[1-9][0-9]*$/", $_POST['amount'])) 
        {
            error (ERROR);
        }
        $item = $db -> Execute("SELECT * FROM potions WHERE id=".$_POST['przedmiot']);
        if ($_POST['amount'] > $item -> fields['amount']) 
        {
            error(NO_AMOUNT.$item -> fields['name'].". <a href=\"mmarket.php\">".A_BACK."</a>");
        }
        $db -> Execute("INSERT INTO potions (owner, name, efect, power, status, cost, type, amount) VALUES(".$player -> id.",'".$item -> fields['name']."','".$item -> fields['efect']."',".$item -> fields['power'].",'R',".$_POST['cost'].",'".$item -> fields['type']."',".$_POST['amount'].")");
        $amount = $item -> fields['amount'] - $_POST['amount'];
        if ($amount < 1) 
        {
            $db -> Execute("DELETE FROM potions WHERE id=".$item -> fields['id']);
        } 
            else 
        {
            $db -> Execute("UPDATE potions SET amount=".$amount." WHERE id=".$item -> fields['id']);
        }
        $smarty -> assign("Message", YOU_ADD.$_POST['amount'].AMOUNT.$item -> fields['name'].ON_MARKET.$_POST['cost'].FOR_GOLDS.". <A href=mmarket.php>".A_BACK."</a>");
    }
}

if (isset($_GET['wyc'])) 
{
    if (!preg_match("/^[1-9][0-9]*$/", $_GET['wyc'])) 
    {
        error (ERROR);
    }
    $item = $db -> Execute("SELECT * FROM potions WHERE id=".$_GET['wyc']);
    if ($item -> fields['owner'] != $player -> id) 
    {
        error (NOT_YOUR);
    }
    require_once('includes/marketdel.php');
    deletepotion($item, $player -> id);
    $smarty -> assign("Message", YOU_DELETE." (<a href=\"mmarket.php\">".A_BACK."</a>)");
}

/**
* Delete all player's potions from market
*/
if (isset ($_GET['view']) && $_GET['view'] == 'del') 
{
    require_once('includes/marketdelall.php');
    deleteallpotion($player -> id);
    $smarty -> assign("Message", YOU_DELETE." (<a href=\"mmarket.php\">".A_BACK."</a>)");
}

/**
* Buy potions on market
*/
if (isset($_GET['buy'])) 
{
    if (!preg_match("/^[1-9][0-9]*$/", $_GET['buy'])) 
    {
        error (ERROR);
    }
    $buy = $db -> Execute("SELECT * FROM `potions` WHERE `id`=".$_GET['buy']." AND `status`='R'");
    if (!$buy -> fields['id']) 
    {
        error (NO_OFERTS);
    }
    if ($buy -> fields['owner'] == $player -> id) 
    {
        error (IS_YOUR);
    }
    $seller = $db -> Execute("SELECT user FROM players WHERE id=".$buy -> fields['owner']);
    $smarty -> assign( array("Name" => $buy -> fields['name'], 
        "Power" => $buy -> fields['power'], 
        "Amount1" => $buy -> fields['amount'], 
        "Itemid" => $buy -> fields['id'], 
        "Cost" => $buy -> fields['cost'], 
        "Seller" => $seller -> fields['user'], 
        "Type" => $buy -> fields['type'], 
        "Sid" => $buy -> fields['owner'],
        "Buyinfo" => BUY_INFO,
        "Potion" => POTION,
        "Oamount" => O_AMOUNT,
        "Pcost" => P_COST,
        "Pseller" => P_SELLER,
        "Bamount" => B_AMOUNT,
        "Ppower" => P_POWER,
        "Abuy" => A_BUY));
    $buy -> Close();
    $seller -> Close();
    if (isset($_GET['step']) && $_GET['step'] == 'buy') 
    {
        if (!preg_match("/^[1-9][0-9]*$/", $_POST['amount'])) 
        {
            error (ERROR);
        }
        $buy = $db -> Execute("SELECT * FROM potions WHERE id=".$_GET['buy']);
        if ($_POST['amount'] > $buy -> fields['amount']) 
        {
            error(NO_AMOUNT.$buy -> fields['name'].ON_MARKET);
        }
        $price = $_POST['amount'] * $buy -> fields['cost'];
        if ($price > $player -> credits) 
        {
            error (NO_MONEY);
        }
        $ncost = ceil($buy -> fields['cost'] * .5);
        $test = $db -> Execute("SELECT id FROM potions WHERE name='".$buy -> fields['name']."' AND owner=".$player -> id." AND status='K' AND power=".$buy -> fields['power']);
        if (!$test -> fields['id']) 
        {
            $db -> Execute("INSERT INTO potions (name, owner, efect, type, power, status, amount) VALUES('".$buy -> fields['name']."',".$player -> id.",'".$buy -> fields['efect']."','".$buy -> fields['type']."',".$buy -> fields['power'].",'K',".$_POST['amount'].")");
        } 
            else 
        {
            $db -> Execute("UPDATE potions SET amount=amount+".$_POST['amount']." WHERE id=".$test -> fields['id']);
        }
        $test -> Close();
        if ($_POST['amount'] == $buy -> fields['amount']) 
        {
            $db -> Execute("DELETE FROM potions WHERE id=".$buy -> fields['id']);
        } 
            else 
        {
            $db -> Execute("UPDATE potions SET amount=amount-".$_POST['amount']." WHERE id=".$buy -> fields['id']);
        }
        $db -> Execute("UPDATE players SET bank=bank+".$price." WHERE id=".$buy -> fields['owner']);
        $db -> Execute("UPDATE players SET credits=credits-".$price." WHERE id=".$player -> id);
        $strDate = $db -> DBDate($newdate);
        $db -> Execute("INSERT INTO `log` (`owner`, `log`, `czas`) VALUES(".$buy -> fields['owner'].",'<b><a href=view.php?view=".$player -> id.">".$player -> user.L_ACCEPT.$player -> id.L_ACCEPT2.$_POST['amount'].L_AMOUNT.$buy -> fields['name'].YOU_GET.$price.TO_BANK."', ".$strDate.")");
        $smarty -> assign("Message", YOU_BUY.$_POST['amount'].L_AMOUNT.$buy -> fields['name'].FOR_A.$price.GOLD_COINS);
        $buy -> Close();
    }
}

/**
* List of all offerts on market
*/
if (isset($_GET['view']) && $_GET['view'] == 'all') 
{
    $oferts = $db -> Execute("SELECT name FROM potions WHERE status='R' GROUP BY name");
    $arrname = array();
    $arramount = array();
    $i = 0;
    while (!$oferts -> EOF) 
    {
        $arrname[$i] = $oferts -> fields['name'];
        $arramount[$i] = 0;
        $query = $db -> Execute("SELECT id FROM potions WHERE status='R' AND name='".$arrname[$i]."'");
        while (!$query -> EOF) 
        {
            $arramount[$i] = $arramount[$i] + 1;
            $query -> MoveNext();
        }
        $query -> Close();
        $oferts -> MoveNext();
        $i = $i + 1;
    }
    $oferts -> Close();
    $smarty -> assign(array("Name" => $arrname, 
        "Amount" => $arramount, 
        "Message" => "<br />(<a href=\"mmarket.php\">".A_BACK."</a>)",
        "Listinfo" => LIST_INFO,
        "Pname" => P_NAME,
        "Pamount" => P_AMOUNT,
        "Paction" => P_ACTION,
        "Ashow" => A_SHOW));
}

/**
* Initialization of variables
*/
if (!isset($_GET['view'])) 
{
    $_GET['view'] = '';
}
if (!isset($_GET['wyc'])) 
{
    $_GET['wyc'] = '';
}
if (!isset($_GET['buy'])) 
{
    $_GET['buy'] = '';
}

/**
* Assign variables to template and display page
*/
$smarty -> assign(array("View" => $_GET['view'], 
    "Delete" => $_GET['wyc'], 
    "Buy" => $_GET['buy'],
    "Aback" => A_BACK));
$smarty -> display('mmarket.tpl');

require_once("includes/foot.php");
?>
