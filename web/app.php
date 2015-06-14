<?php
	//Database Connection
	$db = mysqli_connect("localhost", "root", "", "bracelight");
	
	$info = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM stats WHERE id LIKE '1'"));
?>

<?php if(isset($_GET["wetter"])){?>
<title><?php echo mb_substr($info["wetter"], 0, 1, 'utf-8');?></title>
<?php }?>