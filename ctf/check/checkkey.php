 <?php 
$link = mysql_connect(); //Removed credentials 
if (!$link) { 
    die('Could not connect: ' . mysql_error()); 
} 


mysql_select_db(ufhackctfdb); 




$userName = $_POST['name'];
$userKey = $_POST['key'];

$get = mysql_query("SELECT * FROM  `keytable` LIMIT 0 , 30");

$key = mysql_fetch_row($get);

if ($userKey == $key[0]) {

	 $comment = 'Congrats you found the key!';  
	 $key = 'l33t h4x0r5 0n1y: c0l0IC0gMWEyOWRrbjE=';
	 $result = array("status" => "2", "key" => $key, "comment" => $comment);
     echo json_encode($result);
}
else if ($userKey == "c0l0IC0gMWEyOWRrbjE=") {

	$comment = 'Half way correct, but not quite there.';  
	$key = 'l33t h4x0r5 0n1y: c0l0IC0gMWEyOWRrbjE=';
	$result = array("status" => "1", "key" => $key, "comment" => $comment);
	echo json_encode($result);

}
else {

    $comment = "Incorrect Key.";
    $key = 'l33t h4x0r5 0n1y: c0l0IC0gMWEyOWRrbjE=';
	$result = array("status" => "0", "key" => $key, "comment" => $comment); 
	echo json_encode($result);

}


	$insert = mysql_query("INSERT INTO `entries` (`name`, `key`) VALUES ('$userName', '$userKey')");
mysql_close($link);

?>
