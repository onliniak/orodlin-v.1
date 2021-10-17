<?php
/**
 *   File functions:
 *   Class with information about player viewed by other player
 *
 *   @name                 : view_class.php
 *   @copyright            : (C) 2004,2005,2006,2007 Vallheru Team based on Gamers-Fusion ver 2.5
 *   @author               : thindil <thindil@users.sourceforge.net>
 *   @version              : 1.3
 *   @since                : 28.02.2006
 *
 */
// TODO: Inheritance?
class ViewPlayer
{
    public $user;
    public $id;
    public $level;
    public $lang;
    public $seclang;
    public $avatar;
    public $gg;
    public $jabber;
    public $tlen;
    public $skype;
    public $rank;
    public $gender;
    public $immunited;
    public $age;
    public $race;
    public $class;
    public $max_hp;
    public $hp;
    public $wins;
    public $losses;
    public $lastkilled;
    public $lastkilledby;
    public $profile;
    public $deity;
    public $tribe;
    public $tribe_rank;
    public $refs;
    public $page;

    public $credits;
    public $location;
    public $agility;
    public $inteli;
    public $maps;
    public $rest;

    public $ip;        /// TODO!
    public $lpv;
    /**
    * Class constructor - get data from database and write it to variables
    */
    public function __construct($pid)
    {
        global $db;
        $stats = $db -> Execute('SELECT `id`, `user`, `level`, `lang`, `seclang`, `avatar`, `gg`,`jabber`,`tlen`,`skype`, `rank`, `gender`, `immu`, `age`, `rasa`, `klasa`, `hp`, `max_hp`, `wins`, `losses`, `lastkilled`, `lastkilledby`, `profile`, `deity`, `tribe`, `tribe_rank`, `refs`, `page`, `credits`, `miejsce`, `ip`, `lpv` FROM `players` WHERE `id`='.$pid);
        $this -> id = $stats -> fields['id'];
        $this -> user = $stats -> fields['user'];
        $this -> level = $stats -> fields['level'];
        $this -> lang = $stats -> fields['lang'];
        $this -> seclang = $stats -> fields['seclang'];
        $this -> avatar = $stats -> fields['avatar'];
        $this -> gg = $stats -> fields['gg'];
        $this -> jabber = $stats -> fields['jabber'];
        $this -> tlen = $stats -> fields['tlen'];
        $this -> skype = $stats -> fields['skype'];
        $this -> rank = $stats -> fields['rank'];
        $this -> gender = $stats -> fields['gender'];
        $this -> immunited = $stats -> fields['immu'];
        $this -> age = $stats -> fields['age'];
        $this -> race = $stats -> fields['rasa'];
        $this -> clas = $stats -> fields['klasa'];
        $this -> hp = $stats -> fields['hp'];
        $this -> max_hp = $stats -> fields['max_hp'];
        $this -> wins = $stats -> fields['wins'];
        $this -> losses = $stats -> fields['losses'];
        $this -> lastkilled = $stats -> fields['lastkilled'];
        $this -> lastkilledby = $stats -> fields['lastkilledby'];
        $this -> profile = $stats -> fields['profile'];
        $this -> deity = $stats -> fields['deity'];
        $this -> tribe = $stats -> fields['tribe'];
        $this -> tribe_rank = $stats -> fields['tribe_rank'];
        $this -> refs = $stats -> fields['refs'];
        $this -> page = $stats -> fields['page'];
        $this -> credits = $stats -> fields['credits'];
        $this -> location = $stats -> fields['miejsce'];
        $this -> ip = $stats -> fields['ip'];
        $this -> lpv = $stats -> fields['lpv'];
        $stats -> Close();
    }
}
