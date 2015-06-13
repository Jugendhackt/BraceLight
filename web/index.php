<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>&raquo; Bracelight</title>

    <!-- CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
	
	<!-- FRAMEWORK -->
	<?php 
		//IP Geo
		$city = json_decode(file_get_contents("http://api.hostip.info/get_json.php"));
		$city = $city->{'city'};
		
		//Weather by Location
		$weather = json_decode(file_get_contents("http://api.openweathermap.org/data/2.5/forecast?q=".$city."&lang=de"));
		$weather = $weather->list[0]->weather[0]->description;
		
		//Database Connection
		$db = mysqli_connect("localhost", "root", "", "bracelight");
		
		//DB Aktualisierung
		if(isset($_GET["authkey"]) && $_GET["authkey"] == "iSb26N"){
			//Wetter Aktualisierung
			if(isset($_GET["wetter"])){
				mysqli_query($db, "UPDATE stats SET wetter='".$weather."' WHERE id LIKE '1'");
			}
			//Standort Aktualisierung
			if(isset($_GET["standort"])){
				mysqli_query($db, "UPDATE stats SET aktueller_ort='".$city."' WHERE id LIKE '1'");
			}
		}
	?>
	
	<!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <!-- Menu -->
    <nav class="navbar navbar-inverse">
	<div class="container">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <a class="navbar-brand" href="#">Bracelight</a>
		</div>

		<div class="collapse navbar-collapse">
		  <ul class="nav navbar-nav">
			<li class="active"><a href="?page=home">Startseite</a></li>
			<!--<li><a href="?page=team">Team</a></li>-->
			<!--<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Statistiken <span class="caret"></span></a>
			  <ul class="dropdown-menu" role="menu">
				<li><a href="?page=wetter">Wetter</a></li>
				<li><a href="?page=nachrichten">Nachrichten</a></li>
				<li><a href="?page=anruf">Anruf</a></li>
			  </ul>
			</li>-->
		  </ul>
		</div>
	  </div>
	  </div>
	</nav>
	
	<!-- Content -->
	<div class="container">
		<div class="panel panel-default panel-body panel-content">
		<?php
		//Content Framework
		if($_GET["page"] == null){ header("location: ?page=home");}else{
			if(file_exists("./pages/".$_GET["page"].".php")){
				include("./pages/".$_GET["page"].".php");
			} else {
				echo '<center class="text-danger">Die Seite wurde nicht gefunden.</center>';
			}
		}
		?>
		</div>
	</div>

    
  </body>
</html>