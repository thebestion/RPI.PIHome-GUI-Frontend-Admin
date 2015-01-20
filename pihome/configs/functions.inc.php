<?
/*
 * PiHome v1.0
 * http://pihome.draw-design.com/
 *
 * PiHome Copyright (c) 2012, Sebastian Harke
 * Lizenz Informationen.
 * 
 *
*/


function get_db_table($data) 
{
	global $config;
	return "".$config['prefix']."".$data."";
}


function get_date() 
{
	$now=date("d.m.Y, H:i:s",time());
	return $now;
}


function getCutStrip($cs,$ml,$end)
{
	$cutstrip = $cs;
	$maxlaenge = $ml;
	$cutstrip = (strlen($cutstrip) > $maxlaenge) ? substr($cutstrip,0,$maxlaenge).$end : $cutstrip;
	return $cutstrip;
}


function dbconnect()
{
    global $config;
	if (!($link = mysql_connect($config['DB_HOST'], $config['DB_USER'], $config['DB_PWD'])))
	{
        print "<h3>could not connect to database</h3>\n";
		exit;
	}
	mysql_select_db($config['DB_NAME']);
    return $link;
}


function getcopy()
{
	return '<a href="http://pihome.harkemedia.de" target="_blank" title="PiHome">PiHome</a> &#169; '.date('Y');
}



function getLights()
{
	dbconnect();
	$sql_getLights       = "SELECT * FROM  pi_devices  WHERE aktiv = '1' ORDER BY sort DESC ";
	$query_getLights     = mysql_query($sql_getLights);	
	$x=0;
	while($light = mysql_fetch_assoc($query_getLights)){
		$devices[$x]["id"] = $light['id'];
		$devices[$x]["room_id"] = $light['room_id'];
		$devices[$x]["device"] = $light['device'];
		$devices[$x]["letter"] = $light['letter'];
		$devices[$x]["code"] = $light['code'];
		$devices[$x]["status"] = $light['status'];
		$x=$x+1;
	}
	return $devices;
}


function getRoomById($id)
{
    dbconnect();
    $sql_getroom       = "SELECT * FROM  pi_rooms  WHERE id = '".$id."' ";
    $query_getroom      = mysql_query($sql_getroom);
    while($getroom  = mysql_fetch_assoc($query_getroom)){
        return $getroom['room'];
    }
}



function setLightStatus($id,$status)
{
	dbconnect();
	$sql_light       = "SELECT * FROM  pi_devices  WHERE id = '".$id."' ";
	$query_light      = mysql_query($sql_light);
	while($light  = mysql_fetch_assoc($query_light)){
	$ls = $light['status'];
	}
	if($status=="on"){ $s="1"; }elseif($status=="off"){ $s="0"; }	
	if($s!=$ls){	
		dbconnect();
		$sql_status_update = "UPDATE `pi_devices` SET `status`='".$s."' WHERE `id`='".$id."'";
		mysql_query($sql_status_update);
	}
}



function getCodeById($id)
{
	dbconnect();
	$sql_getcode       = "SELECT * FROM  pi_devices  WHERE id = '".$id."' ";
	$query_getcode      = mysql_query($sql_getcode);
	while($code  = mysql_fetch_assoc($query_getcode)){
		$c["letter"] = $code['letter'];
		$c["code"] = $code['code'];
	}
	return $c;
}



function allOff()
{
	dbconnect();
	$sql_alloff = "SELECT * FROM pi_devices WHERE status = 1 ";
	$query_alloff = mysql_query($sql_alloff);
	while($getallon = mysql_fetch_assoc($query_alloff)){
		$stat="off";		
		setLightStatus($getallon["id"],$stat);		
        if($getallon['letter']=="A"){
            $letter = "1";
        }elseif($getallon['letter']=="B"){
            $letter = "2";
        }elseif($getallon['letter']=="C"){
            $letter = "3";
        }elseif($getallon['letter']=="D"){
            $letter = "4";
        }
        if($stat=="on"){
                $status = "1";
        }elseif($stat=="off"){
                $status = "0";
        }
        $co = $getallon['code'];
        shell_exec('sudo /home/div/rcswitch-pi/send '.$co.' '.$letter.' '.$status.' ');        
	}	
}


?>
