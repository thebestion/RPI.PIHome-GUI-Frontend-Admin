<?
error_reporting(0);
session_start();

/*
 * PiHome v1.0
 * http://pihome.harkemedia.de/
 *
 * PiHome Copyright (c) 2012, Sebastian Harke
 * Lizenz Informationen.
 * 
 * This work is licensed under the Creative Commons Namensnennung - Nicht-kommerziell - Weitergabe unter gleichen Bedingungen 3.0 Unported License. To view a copy of this license,
 * visit: http://creativecommons.org/licenses/by-nc-sa/3.0/.
 *
*/

$username=stripslashes($_POST["username"]);
$passwort=stripslashes($_POST["passwort"]);
$page=stripslashes($_GET["p"]);
$query=trim($_GET["q"]);
$user_id = $_SESSION["pihome_usid"];
######## System Includes ########
require('../configs/dbconfig.inc.php');
require('configs/functions.inc.php');
######### LOGIN ############
if($username) { pihome_acp_login($username,$passwort); }
######### LOGOUT ############
if ($page == "logout") { session_unset(); session_destroy(); ob_end_flush(); header("Location: index.php"); }
##### Page Auswahl nach Session #####
if (isset($_SESSION['pihome_username'])){ include("core/admin.php"); }
if (!isset($_SESSION['pihome_username'])){ include("core/login.php"); }
?>
