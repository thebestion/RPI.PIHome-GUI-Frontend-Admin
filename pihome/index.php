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

include("configs/dbconfig.inc.php");
include("configs/functions.inc.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
	<meta name="viewport" content="width=device-width, user-scalable=no" /> 
	<meta name="format-detection" content="telephone=yes">
	<link rel="shortcut icon" href="images/favicon.png" />
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png"/>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/request.js"></script>
	<title>PiHome</title>
	<script type="text/javascript">
	 $(document).ready(function() {	 	
	    $('#lights').load('lights.php');
	 });	 
	</script>
</head>
<body>


<div id="nav">
	<span><img src="images/pihome.png" id="home" border="0"></span><span><img src="images/spacer.png" border="0"></span><span><a href="javascript:alloff()"><img src="images/all_off.png" border="0"></a></span><span><img src="images/spacer.png" border="0"></span><span><a href="javascript:refresh()"><img src="images/refresh.png" border="0"></a></span>
</div>


<div id="page">
	<div id="lights"></div>
</div>


<div id="settings">
	<a href="admin/"><img src="images/settings.png" border="0" /></a>
</div>


<div id="copy"><?=getcopy();?></div>


</body>
</html>