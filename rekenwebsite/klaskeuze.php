<?php
include_once("functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<?php
		if($_SESSION['loggedIn'] == 1) {
		echo "<form method='post'";
		echo "<div id='logout'><input name='LogOut' value='Logout' type='submit'></div></form>";
	}
	?>

</head>
<body>
	<div id="topBar">
		<div id="name">Basisschool de Splinter</div>
		<div id="logoBack">	
			<img src="images/logo.jpg" id="logo">
		</div>
	</div><br>

<?php
if($_SESSION['role'] == 4 && $_SESSION['loggedIn'] == 1) {
	echo "
<h1 class='center'>In welke klas zit je?</h1>
	<a class='divLink4' href='groep4.php'>4</a>
	<a class='divLink5' href='groep5.php'>5</a>
	<a class='divLink6' href='groep6.php'>6</a>";
}
else {
	header("Location: loginpagina.php");
}


?>
</body>
</html>