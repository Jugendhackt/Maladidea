<?php
include_once('../modules/modules.php');
get_save('sock', 'sock');

$db_res = $mysqli->query("SELECT * FROM `notifications` WHERE sock='" . $sock . "' AND isread='0'");
if ($db_res->num_rows >= 1) {
	$db_res2 = $mysqli->query("UPDATE `notifications` SET `isread`='1' WHERE sock='" . $sock . "' AND isread='0'");
  echo '1';
}
else {
	echo '0';
}

?>