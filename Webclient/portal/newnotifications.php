<?php
include_once('../modules/modules.php');
get_save('lastid', 'lastid');
get_save('sock', 'sock');
$db_res = $mysqli->query("SELECT feedback.* FROM feedback LEFT JOIN socks on feedback.sock=socks.id WHERE socks.name='" . $sock ."' AND feedback.id>'" . $lastid . "'");
if (mysqli_num_rows($db_res) > 0) {
	echo '1';
}
else {
	echo '0';
}
