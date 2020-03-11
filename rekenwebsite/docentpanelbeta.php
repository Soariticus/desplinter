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
 
    }
    ?>
</head>
<body>
<!-- Hieronder word alles gedaan om te checken welke klas welke opdrachten moet krijgen -->
<?php
if(isset($_POST['submit4'])) {
	$aantalVragen = $_POST['aantalVragen4'];
	$maxNumb = $_POST['getal4'];
	$open = True;?><h1><?php
  	$vormGetal = getalBerekenen($_POST['getal']);?></h1><?php
  	decodeForm($vormGetal);
	if(!isset($_POST['min4'])){
		$min = 0;

	}
	else {
		$min = 1;
	}
	pubTest(4, $vorm, $aantalVragen, $maxNumb, $min, $pdo);
}


?>

	<div id="topBar">
		<div id="name">Basisschool de Splinter</div>
		<div id="logoBack">	
			<img src="images/logo.jpg" id="logo">
		</div>
	</div><br>

	<h1 class='centerD'>Docentpanel</h1>
	<div id='toetsen4'>
	<br>
		<div id='bigbold'>Groep 4</div><br />
		Wat moet er op de toets komen?
		<form name='g4' id='g4' method='post'>

	<input type="checkbox" name="getal[]" value="1"> + <br >
    <input type="checkbox" name="getal[]" value="2"> - <br >
    <input type="checkbox" name="getal[]" value="4"> x <br >
    <input type="checkbox" name="getal[]" value="8"> / <br >

		Hoeveel vragen?<br>
			<input type='number' name='aantalVragen4'><br>
		<br>
		Tot welk getal moeten de gegenereerde nummers zijn?<br>
			<input type='number' name='getal4'><br>
		Mag het antwoord <0 zijn?<br>
			<input type='checkbox' name='min4' value='ja'><br>
		Klik hier op om de toets vrij te stellen voor deze groep.<br>
			<input type='submit' name='submit4' value='Vrijstellen'>
		</form>
	</div>

</body>
</html>