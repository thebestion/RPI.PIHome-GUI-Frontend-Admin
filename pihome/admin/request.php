<?
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

require('../configs/dbconfig.inc.php');
require('configs/functions.inc.php');


$what = $_GET['w'];   # device or room
$opp =  $_GET['o'];   # insert, update, delete, ( aktiv only device )
$wid = $_GET['wid'];  # which id


#insert & update device
$device_name = $_GET['device_name'];
$device_letter = $_GET['letter'];
$device_code = $_GET['code'];
$device_aktiv = $_GET['aktiv'];
$device_sort = $_GET['sort'];
$room_id = $_GET['room'];

#insert & update room
$room_name = $_GET['room_name'];


if($what=="device"){

	if($opp=="insert"){
		dbconnect();
		$sql_device_insert= "INSERT INTO pi_devices ( id,room_id,device,letter,code,status,sort,aktiv ) values (  '', '".$room_id."', '".utf8_decode($device_name)."', '".$device_letter."', '".$device_code."', '0', '".$device_sort."', '".$device_aktiv."' )";
		mysql_query($sql_device_insert);
	}elseif($opp=="update"){
		dbconnect();
		$sql_device_update = "UPDATE `pi_devices` SET `room_id`='".$room_id."', `device`='".utf8_decode($device_name)."', `letter`='".$device_letter."', `code`='".$device_code."', `sort`='".$device_sort."', `aktiv`='".$device_aktiv."' ";
		$sql_device_update .= " WHERE `id`='".$wid."'";
		mysql_query($sql_device_update);
	}elseif($opp=="delete"){
		dbconnect();
		$sql_delete_device = "DELETE FROM pi_devices WHERE id = ".$wid;
		mysql_query($sql_delete_device);
	}elseif($opp=="aktiv"){
		if(getDevcieAktivById($wid)=="1"){ $set="0"; }else{ $set="1"; }
		dbconnect();
		$sql_da_update = "UPDATE `pi_devices` SET `aktiv`='".$set."' ";
		$sql_da_update .= " WHERE `id`='".$wid."'";
		mysql_query($sql_da_update);
	}

}elseif($what=="room"){

	if($opp=="insert"){
		dbconnect();
		$sql_room_insert= "INSERT INTO pi_rooms ( id,room ) values (  '', '".utf8_decode($room_name)."' )";
		mysql_query($sql_room_insert);
	}elseif($opp=="update"){
		dbconnect();
		$sql_room_update = "UPDATE `pi_rooms` SET `room`='".utf8_decode($room_name)."' ";
		$sql_room_update .= " WHERE `id`='".$wid."'";
		mysql_query($sql_room_update);
	}elseif($opp=="delete"){
		dbconnect();
		$sql_delete_room = "DELETE FROM pi_rooms WHERE id = ".$wid;
		mysql_query($sql_delete_room);
		echo "del room ".$wid;
	}
	
}




?>