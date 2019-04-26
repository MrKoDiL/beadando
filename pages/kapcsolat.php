<?php
	if($_POST) {
		$email = $_POST["email"];
		$subject = $_POST["subject"];
		$content = $_POST["content"];
		
		if((strlen($subject)<=20 && strlen($subject)>0) && (strlen($email)<=50 && strlen($email)>0) && (strlen($content)<=500 && strlen($content)>0)) {
			
			$db=new PDO("mysql:host=localhost;dbname=database","root","");
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);	
			$result=$db->prepare("insert into messages values('$email','$subject', '$content')");
			$result->execute();
			
			echo "E-mail: $email <br>";
			echo "Tárgy: $subject <br>";
			echo "Tartalom $content <br>";
		}
		else echo "Hibás felvitel!";
	}
	

?>

<html>
	<head>
		<script language="JavaScript">
		function showallmessages() {
			window.location.href="index.php?page=uzenetek";
		}
		
		</script>
	</head>
	
	<body>

		<form method="post" action="">
			E-mail: <input type="email" name="email" id="email"> <br>
			Tárgy: <input type="text" name="subject" id="subject" maxlength="20"> <br>
			Tartalom: <textarea name="content" id="content" maxlength="500"></textarea> <br>
			<input type="submit" value="Küldés">
		</form>
		
		<input type="button" name="messages" id="messages" value="Összes üzenet" onclick="showallmessages()">
		
	</body>
</html>
