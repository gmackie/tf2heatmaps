<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>TF2heatmaps.net - cp_derp_a4</title>
<link href="style.css" rel="stylesheet" type="text/css">
<link href="mapview.css" rel="stylesheet" type="text/css">
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
				'<a href="/login/" class="dialogLink" name="login" style="text-decoration:none">Login</a>
				</div>
	<script type="text/javascript">
	$(function() {
		function loadpage(webpage) {
			window.location.replace( webpage );
		}
	
		$("#searchform").autocomplete({
			source: "/../../search.php",
			minLength: 2,
			select: function(event, ui) {
				loadpage(ui.item ? ("http://www.tf2heatmaps.net/maps/" + ui.item.value + "/") : "http://www.tf2heatmaps.net/maps/");
			}
		});
	});
	</script>
					<div class="ui-widget">
					<label for="searchform">Search: </label>
					<input id="searchform" class="textbox">
					</div>
					<!--<form name="searchform" method="get" action="mapview.php">
						Search:
						<input type="text" name="mapname" id="mapname" class="textbox">
					</form>-->
				
			</div>
    		<div id="title">tf2heatmaps.net</div>
			<span id="serverName">You are currently logged in as ADMIN</span> <a href="/logout/" class="smallButton" name="logput" style="text-decoration:none">Logout</a>
   	 	</div>
  	</div>
    
    <div class="wrap">
    	<div class="sidebar1">
      		<h2 id="mapname">Derp</h2>
			<div class="versinfo">
				Gametype: Control Point
				<br>
				Version: a4
			</div>
            <div class="infobox" id="mapinfo">
            	Total Kills Displayed: 100	<br>
				Last Updated: 01/20/13
            </div>
		</div>
		<div class="content">
			<a href='image.jpg'><img src="image.jpg" alt="" width="711" height="400" class="heatmap"></a>
        </div>
  	</div>
    
</div>

</body>
</html>