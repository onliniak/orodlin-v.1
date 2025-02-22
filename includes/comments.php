<?php
/**
 *   File functions:
 *   Comments to news, updates and polls
 *
 *   @name                 : comments.php
 *   @copyright            : (C) 2006,2007 Vallheru Team based on Gamers-Fusion ver 2.5
 *   @author               : thindil <thindil@users.sourceforge.net>
 *   @version              : 1.3
 *   @since                : 28.02.2007
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
// $Id: comments.php 903 2007-02-28 21:31:27Z thindil $

/**
 * Function to display comments
 */
function displaycomments($intItemid, $strItemtable, $strCommentstable, $strCommentsid)
{
	global $arrBody, $arrAuthor, $arrId, $arrDate, $i;
    global $db;
    
    $oldFetchMode = $db -> SetFetchMode(ADODB_FETCH_NUM);

    if (!preg_match("/^[1-9][0-9]*$/", $intItemid))
    {
        error(ERROR);
    }
    $objText = $db -> getRow("SELECT `id` FROM `".$strItemtable."` WHERE `id`=".$intItemid);
    if (empty($objText))
    {
        error(NO_TEXT);
    }
    $objComments = $db -> getAll("SELECT `id`, `body`, `author`, `time` FROM `".$strCommentstable."` WHERE `".$strCommentsid."`=".$intItemid." ORDER BY `id`");
    $arrBody = array();
    $arrAuthor = array();
    $arrId = array();
    $arrDate = array();
    for ($i=0, $intMax = count($objComments) ; $i < $intMax ; $i++)
    {
        $arrBody[$i] = $objComments[$i][1];
        $arrAuthor[$i] = $objComments[$i][2];
        $arrId[$i] = $objComments[$i][0];
        $arrDate[$i] = $objComments[$i][3];
    }
    $db -> SetFetchMode($oldFetchMode);
}

/**
 * Function to add comments
 */
function addcomments($intItemid, $strCommentstable, $strCommentsid)
{
    global $db;
    global $player;
    global $data;

    if (empty($_POST['body']))
    {
        error(EMPTY_FIELDS);
    }
    if (!preg_match("/^[1-9][0-9]*$/", $intItemid))
    {
        error(ERROR);
    }
    require_once('includes/bbcode.php');
    $strAuthor = $player -> user." ID: ".$player -> id;
    $_POST['body'] = bbcodetohtml($_POST['body']);
    $strBody = $db -> qstr($_POST['body'], get_magic_quotes_gpc());
    $strDate = $db -> DBDate($data);
    $db -> Execute("INSERT INTO `".$strCommentstable."` (`".$strCommentsid."`, `author`, `body`, `time`) VALUES(".$intItemid.", '".$strAuthor."', ".$strBody.", ".$strDate.")");
    if($strCommentstable == 'lib_comments')
    {
        error(C_ADDED.'<p>'.BACK_TO.' <a href="library.php?step=tales&text='.$intItemid.'">'.ATEXT.'</a> '.I_OR.' <a href="library.php?step=comments&text='.$intItemid.'">'.ACOMMENTS.'</a>.</p>');
    }
    error(C_ADDED);
}

/**
 * Function to delete comments
 */
function deletecomments($strCommentstable)
{
    global $db;
    global $player;
    if (!preg_match("/^[1-9][0-9]*$/", $_GET['cid']))
    {
        error(ERROR);
    }
    switch ($player -> rank)
    {
        case 'Admin':
        case 'Staff':
            $db -> Execute('DELETE FROM `'.$strCommentstable.'` WHERE `id`='.$_GET['cid']);
            error(C_DELETED);
            break;
        case 'Redaktor':
            if ($strCommentstable == 'newspaper_comments')
            {
                $db -> Execute('DELETE FROM `'.$strCommentstable.'` WHERE `id`='.$_GET['cid']);
                error(C_DELETED);
            }
            break;
        case 'Bibliotekarz':
            if ($strCommentstable == 'lib_comments')
            {
                $db -> Execute('DELETE FROM `'.$strCommentstable.'` WHERE `id`='.$_GET['cid']);
                error(C_DELETED);
            }
            break;
        default:
            error(NO_PERM);
    }
}
?>
