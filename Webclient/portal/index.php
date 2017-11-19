<html>
	<?php
include_once('../modules/modules.php');
include_head();
?>
<body style="background-image: url(<?php echo $domain; ?>/modules/img/background.jpg); background-size: cover; overflow: hidden; height: 100%; width: 100%">
	<div style="height: 100%; width: 100%; overflow-y: auto">
		<div id="tap-target" class="tap-target teal white-text" data-activates="searchicon">
	    <div class="tap-target-content">
	      <h5>Finden</h5>
	      <p>Finde alle getrackten Daten über deine smarte Socke!</p>
	    </div>
	  </div>
		<div id="topmargin" style="padding: 7rem; transition: 0.5s"></div>
		<div class="container">
			<nav class="teal" id="searchhost">
		    <div class="nav-wrapper">
		        <div class="input-field">
		        	<label id="searchicon" class="label-icon" style="margin-top: -0.7rem; margin-left: 0.5rem;" for="search"><i class="material-icons">search</i></label>
		          <input id="search" type="search" placeholder="Name deiner Socke" onchange="showsock()">
		          <i onclick="$('#stepshost').html(''); $('#topmargin').css('padding', '7rem');" class="material-icons">close</i>
		        </div>
		    </div>
		  </nav>
		  <div id="stepshost">
		  	
		  </div>
		</div>
	</div>
	
	<script>
	$('#tap-target').tapTarget('open');
		function showsock() {
			$('#topmargin').css('padding', '1rem');
			$('#stepshost').load('steps.php?sock=' + $('#search').val());
		}
		
	</script>
</body>
</html>

