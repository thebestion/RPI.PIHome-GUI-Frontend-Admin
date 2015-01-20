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
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>PiHome Admin Panel</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta name="viewport" content="width=device-width, user-scalable=no" />
<meta name="format-detection" content="telephone=yes">
<link rel="shortcut icon" href="images/favicon.png" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
 <script src="js/jquery.min.js"></script>
</head>
<body>


<div id="nav">
	<span><img src="images/pihome_admin.png" id="home" border="0"></span>
</div>

 <div id="page_login">

    <div id="login">
    	<form action="index.php" method="POST" class="form">
            <br><br> 
            <strong>User:</strong><br>
            <input type="text" name="username" />  
            <br><br>
            <strong>Password:</strong><br>
            <input type="password" name="passwort" />
            <br>
            <br>
            <span class="submit"><input type="submit" value="Login" /></span>
            <br><br> <br>            
		</form>
    </div>
    
</div>



<div id="settings">
	<a href="../"><img src="images/back-pihome.png" border="0" /></a>
</div>


<div id="copy"><?=getcopy();?></div>









</body>
</html>