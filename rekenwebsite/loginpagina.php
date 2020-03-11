<?php
include_once("functions.php");

if(isset($_POST['cmdLogin'])) {
$user = $_POST['user'];
$_SESSION['user'] = $_POST['user'];
$pass = $_POST['password'];
login($user, $pass, $pdo);

}

if(isset($_POST['LogOut'])) {
	logout();
}
if(!isset($_SESSION['loggedIn'])){
$_SESSION['loggedIn'] = 0;
}

if(!isset($_SESSION['role'])) {
	$_SESSION['role'] = 9;
}
?>

<html>
<head>
	<title>Login Pagina</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<div id="topBar">
		<div id="name">Basisschool de Splinter</div>
		<div id="logoBack">	
			<img src="images/logo.jpg" id="logo">
		</div>
	</div><br>
		<?php
	if($_SESSION['loggedIn'] == 1) {
		echo "<form method='post'";
		echo "<div id='logout'><input name='LogOut' value='Logout' type='submit'></div></form>";
	}
	?>
<body>
<?php


if($_SESSION['loggedIn'] == 1) {
	switch($_SESSION['role']) {
		case 1:
			$role = "BEHEERDER";
			break;
		case 2:
			$role = "ADMIN";
			break;
		case 3:
			$role = "DOCENT";
			break;
		case 4:
			$role = "LEERLING";
			break;
	}
	echo "<div id='infoP'>Je bent ingelogd" . "<br />" . "Je rol is " . $role . "</div>";

}

	
?>

<div id="loginUI">
<form action="loginpagina.php" name="login" method="post">
	
	<?php
	if($_SESSION['loggedIn'] == 0){

	echo "Gebruikersnaam: <input name='user' type='text'><br />";
	echo "Watchwoord: <input name='password' type='password'><br />";
	echo "<div id='login'><input name='cmdLogin' value='Login' type='submit'></div>";
}
?>
<div id="logout">
<?php
	if($_SESSION['loggedIn'] == 1 && $_SESSION['role'] == 4){
		header("location: klaskeuze.php");
	}
	else if($_SESSION['loggedIn'] == 1 && $_SESSION['role'] == 3) {
		header("location: docentpanel.php");
	}
	
	?>
</div>
</div>
</body>
</html>