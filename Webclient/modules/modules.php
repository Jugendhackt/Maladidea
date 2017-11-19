<?php
if(!isset($_SESSION)) {
    session_start();
}
if ($_SERVER["SERVER_PORT"] == 443) {
    $domain = "https://";
}
else {
    $domain = "http://";
}
$domain .= $_SERVER['HTTP_HOST'] . '';
define('MYSQL_HOST', '******' );
define('MYSQL_BENUTZER', '******' );
define('MYSQL_KENNWORT', '******' );
define('MYSQL_DATENBANK', '******' );
$mysqli = new mysqli (MYSQL_HOST, MYSQL_BENUTZER, MYSQL_KENNWORT, MYSQL_DATENBANK);
if ( !$mysqli )
    error('Lost connection to database. Please try again later.');
$mysqli->set_charset("utf8");


function get_save($variablename, $get_name) {
    if(isset($_GET[$get_name])) {
        global ${$variablename};
        ${$variablename} = save_string(urldecode($_GET[$get_name]));
    }
    else {
        error('GET-attribut is missing (' . $get_name . ')');
    }

}
function post_save($variablename, $post_name) {
    if(isset($_POST[$post_name])) {
        global ${$variablename};
        ${$variablename} = save_string(urldecode($_POST[$post_name]));
    }
    else {
        error('POST-attribut is missing (' . $post_name . ')');
    }
}

function save_string($string) {
    if (isset($mysqli)) {
        return $mysqli->real_escape_string(htmlspecialchars($string));
    }
    else {
        {
            $search = array("\\",  "\x00", "\n",  "\r",  "'",  '"', "\x1a");
            $replace = array("\\\\","\\0","\\n", "\\r", "\'", '\"', "\\Z");
            return str_replace($search, $replace, htmlspecialchars($string));
        }
    }
}



	//include head
	function include_head() {
	  global $domain;
	  ?>
	  <head>
	  	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $domain; ?>/include/img/logo.png">
	  	<!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="<?php echo $domain; ?>/modules/css/materialize.min.css"  media="screen,projection"/>
			<meta http-equiv="content-type" content="text/html; charset=utf-8">
			<title>Maladidea</title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
			<meta name="theme-color" content="pink">
			<meta http-equiv="language" content="EN">
			<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="<?php echo $domain; ?>/modules/js/materialize.min.js"></script>
      <style>
      	.nocircle {
      		border-radius: 0 !important;
      	}
      </style>
	  </head>
	  <?php
	}
	
	//include navbar
	function include_navbar($title) {
	  global $domain;
		?>
		<div class="navbar-fixed">
	    <nav class="pink accent-1">
	    	<div class="container">
	    		<div class="nav-wrapper">
	        <a href="#!" class="brand-logo">Logo</a>
		        <ul class="right hide-on-med-and-down">
		          <li><a href="about.php">About us</a></li>
		        </ul>
		      </div>
	    	</div>
	      
	    </nav>
	  </div>
		<?php
	}
?>