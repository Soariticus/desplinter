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
    if($_SESSION['loggedIn'] == 0 || $_SESSION['role'] != 4){
    	header("location: loginpagina.php");
    }

    $toets = readTest(4, $pdo);
    $score = 0;
    $point = 0;
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
    $bijVraag = 0;
    $rand1 = rand(1, $toets['maxgetal']);
    $rand2 = rand(1, $toets['maxgetal']);
    $op = decodeForm($toets['vorm']);
    //echo $op;
   // echo $toets['vorm'];
    $ope = explode(",", $op);
    $ops = count($ope);

    $operator = rand(1, $ops) -1;

    
    if(isset($_POST['submit'])){
        $point = getAns($_POST['op']);
        $score = $score + $point;
        echo $_POST['score'];
        $bijVraag = $_POST['bijVraag'] + 1;
    }


    if($toets['min'] == 0){    
    while($rand2 > $rand1) {
        $rand2 = rand(1, $toets['maxgetal']);
    }
    }

if($bijVraag < $toets['vragen'])
{
 echo '   <div id="vragen6">
    Wat is ' .  $rand1 . ' ' . $ope[$operator] . " " . $rand2 . "?" . '
    <form method="post" action="toetsG4" name="ja">
       Antwoord:
            <input type="text" name="antwoord" id="antwoord" placeholder="Jouw antwoord">
            <input type="hidden" id="int1" name="int1" value=' . $rand1 . '>
            <input type="hidden" id="int2" name="int2" value=' . $rand2 . '>
            <input type="hidden" id="op" name="op" value=' . $ope[$operator] . '>
            <input type="hidden" id="bijVraag" name="bijVraag" value="'.$bijVraag.'">
            <input type="hidden" id="score" name="score" value="'. $score .'">
            <input type="submit" name="submit" id="submit">
        </form>
    </div> ';
}
else
{
    echo "max vragen is gehaald";
}


// if($toets['vragen'] > $num){
//     $num = question($toets, $num);
// }



?>


</body>
</html>