<?php
	//Database Connection
	$db = mysqli_connect("localhost", "root", "", "bracelight");
	
	$info = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM stats WHERE id LIKE '1'"));
?>

<?php if(isset($_GET["wetter"])){?>
<title><?php echo $info["wetter"];?></title>
<?php }?>