<?php
include_once("functions.php") ?>

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
    if($_SESSION['loggedIn'] == 1 
	&& $_SESSION['role'] == 3) {		

    $g4 = readScore(4, $pdo);
    $g4a = count($g4);

    $g5 = readScore(5, $pdo);
    $g5a = count($g5);
    
    $g6 = readScore(6, $pdo);
    $g6a = count($g6);


?>
</head>
<body>
	<div id="topBar">
		<div id="name">Basisschool de Splinter</div>
		<div id="logoBack">	
			<img src="images/logo.jpg" id="logo">
		</div>
	</div><br>
		
	<h1 class='centerD'>Resultaten</h1>
	<div id='toetsen4'>
	<br>
		<div id='bigbold'>Groep 4</div><br />
		<?php for($i = 0; $i < $g4a; $i++){
			echo $g4[$i] . "<br>";
		} ?>
	</div>
		<div id='toetsen4'>
	<br>
		<div id='bigbold'>Groep 5</div><br />
		<?php for($i = 0; $i < $g5a; $i++){
			echo $g5[$i] . "<br>";
		} ?>
	</div>
		<div id='toetsen4'>
	<br>
		<div id='bigbold'>Groep 6</div><br />
		<?php for($i = 0; $i < $g6a; $i++){
			echo $g6[$i] . "<br>";
		} ?>
	</div><?php
}
else {
	header("Location: loginpagina.php"); }
?>

</body>
</html>