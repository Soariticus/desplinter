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
    ?>
</head>
<body>
<!-- Hieronder word alles gedaan om te checken welke klas welke opdrachten moet krijgen -->
<?php
if(isset($_POST['submit4'])) {
	$aantalVragen = $_POST['aantalVragen4'];
	$maxNumb = $_POST['maxgetal4'];
	$open = True;
  	$vorm = getalBerekenen($_POST['getal4']);
  	echo "<br>" . $vorm;
	if(!isset($_POST['min4'])){
		$min = 0;

	}
	else {
		$min = 1;
	}
	pubTest(4, $vorm, $aantalVragen, $maxNumb, $min, $pdo);
}

if(isset($_POST['submit5'])) {
	$aantalVragen = $_POST['aantalVragen5'];
	$maxNumb = $_POST['maxgetal5'];
	$open = True;
  	$vormGetal = getalBerekenen($_POST['getal5']);
  	$vorm = decodeForm($vormGetal);
	if(!isset($_POST['min5'])){
		$min = 0;

	}
	else {
		$min = 1;
	}
	pubTest(5, $vorm, $aantalVragen, $maxNumb, $min, $pdo);
}

if(isset($_POST['submit6'])) {
	$aantalVragen = $_POST['aantalVragen6'];
	$maxNumb = $_POST['maxgetal6'];
	$open = True;
  	$vormGetal = getalBerekenen($_POST['getal6']);
  	$vorm = decodeForm($vormGetal);
	if(!isset($_POST['min6'])){
		$min = 0;

	}
	else {
		$min = 1;
	}
	pubTest(6, $vorm, $aantalVragen, $maxNumb, $min, $pdo);
}


?>


	<div id="topBar">
		<div id="name">Basisschool de Splinter</div>
		<div id="logoBack">	
			<img src="images/logo.jpg" id="logo">
		</div>
	</div><br>
<?php
if($_SESSION['loggedIn'] == 1 
	&& $_SESSION['role'] == 3) {
	echo "

	<h1 class='centerD'>Docentpanel</h1>
	<a class='divLinkD' href='docentview.php'>Klik hier om naar de resultaten te gaan!</a>
	<div id='toetsen4'>
	<br>
		<div id='bigbold'>Groep 4</div><br />
		Wat moet er op de toets komen?
		<form name='g4' id='g4' method='post'>
		<input type='checkbox' name='getal4[]' value='1'> +
    	<input type='checkbox' name='getal4[]' value='2'> - <br >
    	<input type='checkbox' name='getal4[]' value='4'> x
    	<input type='checkbox' name='getal4[]' value='8'> / <br >
		Hoeveel vragen?<br>
			<input type='number' name='aantalVragen4'><br>
		<br>
		Tot welk getal moeten de gegenereerde nummers zijn?<br>
			<input type='number' name='maxgetal4'><br>
		Mag het antwoord <0 zijn?<br>
			<input type='checkbox' name='min4' value='ja'><br>
		Klik hier op om de toets vrij te stellen voor deze groep.<br>
			<input type='submit' name='submit4' value='Vrijstellen'>
		</form>
	</div>
	<div id='toetsen5'>
	<br>
		<div id='bigbold'>Groep 5</div><br />
		Wat moet er op de toets komen?
				<form name='g5' id='g5' method='post'>
		<input type='checkbox' name='getal5[]' value='1'> +
    	<input type='checkbox' name='getal5[]' value='2'> - <br >
    	<input type='checkbox' name='getal5[]' value='4'> x
    	<input type='checkbox' name='getal5[]' value='8'> / <br >
		Hoeveel vragen?<br>
			<input type='number' name='aantalVragen5'><br>
		<br>
		Tot welk getal moeten de gegenereerde nummers zijn?<br>
			<input type='number' name='maxgetal5'><br>
		Mag het antwoord <0 zijn?<br>
			<input type='checkbox' name='min5' value='ja'><br>
		Klik hier op om de toets vrij te stellen voor deze groep.<br>
			<input type='submit' name='submit5' value='Vrijstellen'>
		</form>
	</div>
	<div id='toetsen6'>
	<br>
		<div id='bigbold'>Groep 6</div><br />
		Wat moet er op de toets komen?
				<form name='g6' id='g6' method='post'>
		<input type='checkbox' name='getal6[]' value='1'> +
    	<input type='checkbox' name='getal6[]' value='2'> - <br >
    	<input type='checkbox' name='getal6[]' value='4'> x
    	<input type='checkbox' name='getal6[]' value='8'> / <br >
		Hoeveel vragen?<br>
			<input type='number' name='aantalVragen6'><br>
		<br>
		Tot welk getal moeten de gegenereerde nummers zijn?<br>
			<input type='number' name='maxgetal6'><br>
		Mag het antwoord <0 zijn?<br>
			<input type='checkbox' name='min6' value='ja'><br>
		Klik hier op om de toets vrij te stellen voor deze groep.<br>
			<input type='submit' name='submit6' value='Vrijstellen'>
		</form>
	</div>";}
else {
	header("Location: loginpagina.php");
}

?>
</body>
</html>