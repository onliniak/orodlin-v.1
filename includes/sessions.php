<?php
include 'adodb/session/adodb-cryptsession2.php';
include 'adodb/session/adodb-compress-gzip.php';
include 'adodb/session/adodb-encrypt-sha1.php';
include 'includes/config.php';

ADOdb_Session::config($driver, $host, $user, $password, $database, $options=false);
ADODB_Session::filter(new ADODB_Compress_Gzip());
ADODB_Session::filter(new ADODB_Encrypt_Sha1());
session_start();
