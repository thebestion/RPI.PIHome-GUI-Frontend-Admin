<?/*
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

include("configs/dbconfig.inc.php");
include("configs/functions.inc.php");

$value = $_GET["s"];

if($_GET["s"]){

	$cutvalue=explode("_", $value);
	$lid  = $cutvalue[0];
	$stat = $cutvalue[1];

	setLightStatus($lid,$stat);
	$code = getCodeById($lid);

	if($code['letter']=="A"){
		$letter = "1";
	}elseif($code['letter']=="B"){
		$letter = "2";
	}elseif($code['letter']=="C"){
		$letter = "3";
	}elseif($code['letter']=="D"){
		$letter = "4";
	}

	if($stat=="on"){
                $status = "1";
        }elseif($stat=="off"){
                $status = "0";
        }

	$co = $code['code'];

	#echo "sudo /home/div/rcswitch-pi/send ".$co." ".$letter." ".$status;
	shell_exec('sudo /home/div/rcswitch-pi/send '.$co.' '.$letter.' '.$status.' ');
}
?>
