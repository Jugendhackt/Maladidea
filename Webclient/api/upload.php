<?php
include_once('../modules/modules.php');
get_save('time', 'time');
get_save('value', 'value');
get_save('sock', 'sock');
$db_res = $mysqli->query("INSERT INTO `feedback`(`time`, `value`, `sock`) VALUES ('" . $time . "','" . $value . "', '" . $sock . "')");
$db_res2 = $mysqli->query("SELECT * FROM feedback WHERE time >= timestamp '" . $time . "' - interval '20' second AND sock='" . $sock . "' AND finished='0'");
	if ($db_res2->num_rows >= 5) {
		$db_res4 = $mysqli->query("UPDATE `feedback` SET `finished`='1' WHERE time >= timestamp '" . $time . "' - interval '15' second AND sock='" . $sock . "'");
		$db_res3 = $mysqli->query("SELECT * FROM notifications_links WHERE socks='" . $sock . "'");
		$mysqli->query("INSERT INTO `notifications`(`sock`, `isread`) VALUES ('" . $sock . "','0')");
		$empfaenger = $db_res3->fetch_array()['email'];
		echo 'mail sent';
		$betreff = 'MaladIdea';
		$nachricht = 'MaladIdea hat eine verdächtige Bewegung getrackt!';
		$header = 'From: thomas@heinemann.at' . "\r\n" .
	    'Reply-To: thomas@heinemann.at' . "\r\n" .
	    'X-Mailer: PHP/' . phpversion();
		mail($empfaenger, $betreff, $nachricht, $header);
}
else {
	echo '0';
}
?>