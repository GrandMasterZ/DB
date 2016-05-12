<?php 

$vardaiV = array("Juozas","Petras","Marius","Saulius","Darius","Domas","Svajunas");
$vardaiM = array("Indre","Dainora","Ieva","Egle","Aiste","Nora");
$pavardesV = array("Kazlauskas","Stankevicius","Petrauskas","Jankauskas","Zukauskas","Butkus","Balciunas");
$pavardesM = array("Kazlauskiene", "Stankeviciene","Petrauskaite","Jankauskaite","Zukauskiene","Butkiene","Balciunaite");
$blabla = array (1,2,3,4,5,6,7,7,7,7,7,7,7,7,7,7,7,7,7,7,7,7,7,7,77,7,7,7,7,7,7,7,7,7,7,7,)
?>
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
echo "connection ok </br>";
for($id=1; $id<100; $id++)
{
	$lytis="";
	$asmens_kodas="";
	$metai = rand(1975,2002);
	$menuo = rand(1,12);
	$vardas;
	$pavarde;
	$DuPas=$metai;
	$diena = rand(1,30);
	if($menuo<10)
	{
		$menuo = "0".$menuo;
	}
	if($diena<10)
	{
		$diena = "0".$diena;
	}
	$viskas = $metai ."-".$menuo ."-" . $diena ;
	$MorF = rand(1,2);
	$randomVV = rand(0,6);
	$randomVP = rand(0,6);
	$randomMV = rand(0,5);
	$randomMP = rand(0,6);
	if($MorF==1)
	{
		while ( $DuPas > 100 ) 
		{
   			 $DuPas = (int) $DuPas / 10;
		}
		$lytis="M";
		$asmens_kodas = "3". $metai . $menuo . $diena . rand(1000,9999);
		$vardas = $vardaiV[$randomVV];
		$pavarde = $pavardesV[$randomVP];
	}
	else
	{
		$lytis="F";
		$asmens_kodas = "4". $DuPas . $menuo . $diena . rand(1000,9999);
		$vardas = $vardaiM[$randomMV];
		$pavarde = $pavardesM[$randomMP];
	}
	$domain = rand(1,2);
	$pastas="";
	switch($domain)
	{
		case 1:
		$pastas="@gmail.com";
		break;
		case 2:
		$pastas="@yahoo.com";
		break;
	}

	$epastas=$pavarde . "." . $vardas . $pastas;
	$nrPab = rand(1000000,9999999);
	$nr = "86" . $nrPab;
	echo $id . " " . $asmens_kodas . " " . $nr . " " . $vardas . " " . $pavarde . " ". $epastas. " " . $viskas . " " . $lytis . " Lithuanian </br>";
	$query="INSERT INTO `klientas` (`id_Klientas`, `asmens_kodas`, `telefonas`, `vardas`, `pavarde`, `e_pastas`, `gimimo_data`,`lytis`,`tautybe`) VALUES ('".$id."', '". $asmens_kodas ."', '".$nr."', '".$vardas."', '".$pavarde."', '".$epastas."','". $viskas."','".$lytis."','Lithuanian');";
	if($conn->query($query) ===TRUE)
{
	echo "success";
}
else
{
	echo "error:" . $conn->error;
}
}

echo $query;
$id++;
?>
</body>
</html>