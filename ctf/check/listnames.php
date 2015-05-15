<?php 
$link = mysql_connect(); 
if (!$link) { 
    die('Could not connect: ' . mysql_error()); 
} 

mysql_select_db(ufhackctfdb); 

$result = mysql_query("SELECT * FROM `entries` LIMIT 0, 200");

if (!$result) 
{
	echo "Failed to load query";
	exit;
}

if (mysql_num_rows($result) == 0) {
	echo "No rows found";
	exit;
}

while ($row = mysql_fetch_assoc($result)) {
	if ($row["key"] == "SIT-1A29DKN1"){
		echo $row["name"];
		echo " -- SUCCESS";
		echo "<br>";
	}
	else
	{
		echo $row["name"];
		echo " -- failed";
		echo "<br>";
	}
	
}

mysql_close($link);
?>
