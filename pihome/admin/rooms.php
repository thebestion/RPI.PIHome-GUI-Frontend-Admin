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
?>


<ul>
	<?
	$rp=getRooms();
	for($x=0;$x<count($rp);$x++){	
	?>	
		<li>
			<div class="light">			
				<div class="name_room"><div class="device"><?=utf8_encode($rp[$x]["room"]);?></div></div>
				<div class="btn_room">
					<span><a href="javascript:update_room('<?=$rp[$x]["id"];?>');"><img src="images/work.png" border="0"></a></span><span><a href="javascript:del_room('<?=$rp[$x]["id"];?>');"><img src="images/del.png" border="0"></a></span>
				</div>
			</div>
		</li>
	<?
	}
	?>	
</ul>