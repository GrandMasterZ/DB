<html>
<head>
</head>
<body>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "db_lab1";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
for($i=1; $i<150; $i++)
{
	$kiekis = rand(1,7);
	$seansoId = rand(1,25);
	$klientoId = rand(1,99);
	$query = "INSERT INTO `bilietas` (`id_Bilietas`, `kiekis`, `fk_Seansasid_Seansas`, `fk_Klientasid_Klientas`) VALUES ('".$i."', ".$kiekis.", ".$seansoId.", ".$klientoId.");";
	if($conn->query($query) ===TRUE)
	{
		echo "success";
	}
	else
	{
		echo "error:" . $conn->error;
	}
}
?>
</body>
</html>