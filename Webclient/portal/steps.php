<?php
include_once('../modules/modules.php');
get_save('sock', 'sock');
?>
<ul class="collection">
<?php

$db_res = $mysqli->query("SELECT feedback.* FROM feedback LEFT JOIN socks on feedback.sock=socks.id WHERE socks.name='" . $sock ."' ORDER BY time DESC LIMIT 50");
$counter = 0;
while($row = $db_res->fetch_array()) {
  $counter++;
	?>
    <li class="collection-item avatar">
      <img src="<?php echo $domain; ?>/modules/img/step.svg" alt="" class="circle nocircle">
      <span class="title">1 Schritt</span>
      <p class="grey-text"><?php echo date('j. n. Y, H:i:s',strtotime($row['time'])); ?></p>
    </li>
	<?php
}
if ($counter == 0) {
  echo '<p style="padding: 3rem;">Keine Schritte gefunden</p>';
}
?>
</ul>
<?php
$db_res = $mysqli->query("SELECT feedback.* FROM feedback LEFT JOIN socks on feedback.sock=socks.id WHERE socks.name='" . $sock ."' ORDER BY id DESC LIMIT 1");
$lastid = $db_res->fetch_array()['id'];
?>
<script>
  var intervalID;
  var freqSecs = 1;
  intervalID = setInterval (RepeatCall, freqSecs*1000 );

  function RepeatCall() {
    $.post( "newnotifications.php?sock=<?php echo $sock; ?>&lastid=<?php echo $lastid; ?>", function( data ) {
      if (data == 1) {
        window.clearInterval(intervalID);
        $('#stepshost').load('steps.php?sock=<?php echo $sock; ?>');
        Materialize.toast('Neuer Schritt erkannt!', 3000);
      }
    });
  }
</script>