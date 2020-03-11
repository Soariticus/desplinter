<?php include_once('functions.php') ?>

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
	    <?php
    $rand1 = rand(0, 50);
    $rand2 = rand(0, 50);
    $operator = rand(0,1);

    while($rand2 > $rand1) {
        $rand2 = rand(0, 500);
    }

    switch($operator){
    case 0:
        $op = "+";
        break;
    case 1:
        $op = "-";
        break;
    case 2:
        $op = "*";
        break;
    case 3:
        $op = "/";
        break;
       }

    if($_SESSION['loggedIn'] == 1 && $_SESSION['role'] == 4){
        echo '


    <div id="topBar">
        <div id="name">Basisschool de Splinter</div>
        <div id="logoBack"> 
            <img src="images/logo.jpg" id="logo">
        </div>
    </div><br>
    <a class="divLink" href="toetsG4">Klik hier om naar de toetsen te gaan!</a>

    <h1 class="center4">Groep 4</h1>
    <?php


        ?><div id="resultaat"><?php
    if(isset($_POST["submit"])) {
        antwoordCheck($operator);
    }


   ?> </div>
    <div id="vragen4">
    Wat is '; echo $rand1 . " " . $op . " " . $rand2 . "?"; echo'
    <form method="post" action="" name="ja">
       Antwoord:
            <input type="text" name="antwoord" id="antwoord" placeholder="Jouw antwoord">
            <input type="hidden" id="int1" name="int1" value="<?php echo $rand1 ?>">
            <input type="hidden" id="int2" name="int2" value="<?php echo $rand2 ?>">
            <input type="submit" name="submit" id="submit">
        </form>
    </div>
    ';}
    else {
        header("Location: loginpagina.php");
    }
    ?>
</body>
</html>