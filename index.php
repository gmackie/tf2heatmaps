<!DOCTYPE HTML>
<html>
<head>
<?PHP
	date_default_timezone_set('America/Los_Angeles');
	require_once($_SERVER['DOCUMENT_ROOT'].'/includes/class.db.php');
	$db = new db('tf2db.tf2heatmaps.net','cyked','bambinos4', 'tf2db', '3306');
	$loggedin = false;
	//Checks if there is a login cookie 

	if(isset($_COOKIE['ID_my_site'])) {

//if there is, it logs you in and sets the login switch to true

		$username = $db->real_escape_string($_COOKIE['ID_my_site']); 
		$pass = $_COOKIE['Key_my_site']; 	 	
		$check = $db->query("SELECT * FROM users WHERE username = '$username'"); 	
		while($info = $check->fetch_array()) { 		
			if ($pass = $info['password']) { 
				$loggedin = true; 			
			}	 		
		} 
		
	} 
	?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>TF2heatmaps.net</title>
<link href="http://www.tf2heatmaps.net/files/style.css" rel="stylesheet" type="text/css">
<link href="http://www.tf2heatmaps.net/files/verify.css" rel="stylesheet" type="text/css">
<link href="http://www.tf2heatmaps.net/includes/jQuery/css/custom-theme/jquery-ui-1.8.2.custom.css" rel="stylesheet" type="text/css" />
<script src="http://www.tf2heatmaps.net/includes/jQuery/js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="http://www.tf2heatmaps.net/includes/jQuery/js/jquery-ui-1.8.2.custom.min.js" type="text/javascript"></script>
</head>

<body>
<div class="container">
  	<div id="header">
  		<div class="wrap">
			<div id="user">
				<div class="links">
				<a href="/" class="dialogLink" name="home" style="text-decoration:none">Home</a> 
				<?PHP
				if ( $loggedin) {
					echo('<a href="/usercp/" class="dialogLink" name="controlpanel" style="text-decoration:none">User cp</a>');
				}
				else {		
					echo('<a href="/login/" class="dialogLink" name="login" style="text-decoration:none">Login</a>'); 
				}
				?>
				</div>
					<div class="ui-widget">
					<label for="searchform">Search: </label>
					<input id="searchform" class="textbox">
					</div>
					<!--<form name="searchform" method="get" action="search.php">
						Search:
						<input type="text" name="mapname" id="mapname" class="textbox">
					</form>-->
				
			</div> 
    		<div id="title">tf2heatmaps.net</div>
			<?PHP if($loggedin) echo '<span id="serverName">You are currently logged in as ' .$username. '</span> <a href="/logout/" class="smallButton" name="logput" style="text-decoration:none">Logout</a>'; ?>
   	 	</div>
  	</div>
    
    <div class="wrap">
	<?PHP
	$counter = 0;
	$verifylist = $db->query("SELECT id,map, updated, author, prevkills FROM tf2_maps WHERE prevkills>0 ORDER BY prevkills DESC");
	while($info = $verifylist->fetch_array()) {
		$mapname = $info[1];
		$mapid = $info[0];
		$updated = $info[2];
		$author = $info[3];
		$prevkills = $info[4];
		$date = date("F j, Y, g:i a",$updated);
		echo'<div class="verifylist" id="'.$counter.'"> 
		<div class="imageholder">
		<a href="http://tf2heatmaps.net/maps/'.$mapname.'"><img src="../images/heatmaps/dst/'.$mapname.'.jpg" alt="'.$mapname.'" height="243px" width="432px"></img></a> 
	</div> 
	<div class="mapinfo"> 
		<h2><a href="http://tf2heatmaps.net/maps/'.$mapname.'">'.$mapname.'</a></h2> 
		<ul> 
			<li><strong>Date Uploaded: </strong>'.$date.'</li> 
			<li><strong>Author: </strong>'.$author.'</li>
			<li><strong>Kills: </strong>'.$prevkills.'</li>
		</ul>
	</div> 
    <div class="clear"> 
	</div> 
</div>';
		$counter = $counter + 1;
	}
?>
	</div>
</div>

</body>
</html>
