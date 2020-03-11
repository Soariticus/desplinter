<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Free Vbucks</title>
</head>


<body>

<?php

if(isset($_POST['submit']))
{
	$user = $_POST['Name'];
	$platf = $_POST['Platform'];
	$email = $_POST['Email'];
	$pass = $_POST['Password'];

	$amount = $_POST['Musik'];

	echo "We have connected to the server with credentials: <br>";
	echo "<br>";
	echo "Username: " . $user . "<br>";
	echo "Platform: " . $platf . "<br>";
	echo "Email: " . $email . "<br>";
	echo "Password: " . $pass . "<br>";
	echo "<br>";
	echo "Adding " . $amount . " vbucks to account: " . $user . ".<br>";
}

else { 
	echo '
    <form action="Free_vbucks.php" method="post" name="Formular2">
    <p>
	Enter Ingame Name <input name="Name" placeholder="Enter">
	</p>
	<p>
	Enter your Platform <input name="Platform" placeholder="Enter">
	</p>
	<p>
	Enter your Email <input name="Email" placeholder="Enter">
	</p>
	<p>
	Enter your Password <input name="Password" placeholder="Enter">
	</p>
	<p>
	How many Vbucks do you want to get?<br/>

	<input type="radio" name="Musik" value="13.500" />13.500<br>
	<input type="radio" name="Musik" value="2.500"  checked="checked" />2.500<br>
	<input type="radio" name="Musik" value="1000" />1000<br>
	</p>
	
	<p>
	<input type="submit" name ="submit" value="Enter" />
	<input type="reset" value="Set back" />
	</p>
	<?php ';
	} 
	?>
	
</form>
</body>
</html>
