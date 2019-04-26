<?php
	$db=new PDO("mysql:host=localhost;dbname=database","root","");
	$result=$db->prepare("select * from messages");
	$result->execute();
	$result=$result->fetchAll();
	
	foreach($result as $msg) {
		echo $msg["email"] . "<br>";
		echo $msg["subject"] . "<br>";
		echo $msg["content"] . "<hr>";
		
	}
?>