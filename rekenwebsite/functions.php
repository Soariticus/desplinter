<?php
session_start();

function debug($message)
{
    echo '<script>';
    echo "console.log('".$message."')";
    echo '</script>';
}

function db()
{
    $Host = '127.0.0.1';
    $Db = 'rekenwebsite';
    $User = 'root';
    $Pass = '';
    $Charset = 'utf8mb4';

    $Dsn = "mysql:host=$Host;dbname=$Db;charset=$Charset";
    $Options = [
        PDO::ATTR_ERRMODE             => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES     => false,
    ];
    try {
        $Pdo = new PDO($Dsn, $User, $Pass, $Options);
        return $Pdo;
    } catch (\PDOExeption $E) {
        throw new \PDOExeption($E->getMessage(), (int)$E->getCode());
        return "0";
    }
}

$pdo = db();

function login($user, $pass, $pdo) 
{
	$start = $pdo->query("SELECT * FROM `login` WHERE `username` = '$user' AND `password` = '$pass';");
	$rowsAffected = $start->rowCount();
	if($rowsAffected == 0)
	{
		echo "<div id='infoN'>Gebruikersnaam en wachtwoord komen niet overeen.</div>";
	}
	else {
		$_SESSION['username'] = $user;
		$rij = $start->fetch();
		$_SESSION['role'] = $rij['role'];
		$_SESSION['loggedIn'] = 1;
	}
}

function logout()
{
	session_destroy();
	$_SESSION['loggedIn'] = 0;
	$_SESSION['role'] = 9;
	$_SESSION['username'] = Null;
    header("location: loginpagina.php");
}

function antwoordCheck($operator) {
        $int1 = $_POST['int1'];
        $int2 = $_POST['int2'];
        $userAntwoord = $_POST['antwoord'];

        switch($operator){
            case 0:
                $answ = $int1 + $int2;
                $op = "+";
                break;
            case 1:
                $answ = $int1 - $int2;
                $op = "-";
                break;
            case 2:
                $answ = $int1 * $int2;
                $op = "*";
                break;
            case 3:
                $answ = $int1 / $int2;
                $op = '/';
                break;
                }

        if($userAntwoord == $answ) {
            echo 'Goedzo!';
        } else {
            echo 'Oeps, dat was fout';
        }
}

if(isset($_POST['LogOut'])) {
    logout();
}

function pubTest($klas, $vorm, $vragen, $maxgetal, $min, $pdo){
    $stmt = $pdo->prepare('UPDATE toets SET klas = :klas, vorm = :vorm, vragen = :vragen, maxgetal = :maxgetal, min = :min WHERE klas = '.$klas.'');
    $stmt->execute([      'klas' => $klas,
        'vorm' => $vorm,
        'vragen' => $vragen,
        'maxgetal' => $maxgetal,
        'min' => $min
    ]);
}

function getalBerekenen($postData){
  $nieuwGetal = 0;
  foreach($postData as $getal){
    $nieuwGetal = $nieuwGetal + $getal;
  }
  return $nieuwGetal;
}

function decodeForm($num){
    switch($num){
        case 0:
            return Null;
            break;
        case 1:
            $res = "+";
            break;
        case 2:
            $res = "-";
            break;
        case 3:
            $res = "+,-";
            break;
        case 4:
            $res = "*";
            break;
        case 5:
            $res = "+,*";
            break;
        case 6:
            $res = "-,*";
            break;
        case 7:
            $res = "+,-,*";
            break;
        case 8:
            $res = "/";
            break;
        case 9:
            $res = "+,/";
            break;
        case 10:
            $res = "-,/";
            break;
        case 11:
            $res = "+,-,/";
            break;
        case 12:
            $res = "*,/";
            break;
        case 13:
            $res = "+,*,/";
            break;
        case 14:
            $res = "-,*,/";
            break;
        case 15:
            $res = "+,-,*,/";
            break;
    }
    return $res;
}


function readTest($class, $pdo) 
{
    $start = $pdo->query("SELECT * FROM `toets` WHERE `klas` = '$class';");
    
        $toets = $start->fetch();
        return $toets;
   
}

function getAns($op){
    $ans = 0;
    $num1 = $_POST['int1'];
    $num2 = $_POST['int2'];
    $userAntwoord = $_POST['antwoord'];
    switch($op){
        case "+":
            $ans = $num1 + $num2;
            break;
        case "-":
            $ans = $num1 - $num2;
            break;
        case "*";
            $ans = $num1 * $num2;
            break;
        case "/":
            $ans = $num1 / $num2;
            break;
        default:
            echo "Error 197/fun: op = " . $op . "<br>";
            break;

    }

    if($userAntwoord == $ans) {
            return 1;
        } else {
            return 0;
        } 
}

function writeScore($goedP){
    $stmt = $pdo->prepare('INSERT INTO score (userID, goed%) VALUES (:userID, :goedP)');
    $stmt->execute([      
        'userID' => $_SESSION['userID'],
        'goedP' => $goedP
    ]);
}

function readScore($class, $pdo){
    $start = $pdo->query("SELECT * FROM `score` WHERE `klas` = '$class';");
    
        $score = $start->fetch();
        return $score;
   
}


?>