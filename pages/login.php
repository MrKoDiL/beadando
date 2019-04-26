<?php 

	if($_POST)
	{
		if($_POST["posttype"]=="register")
		{
			$db=new PDO("mysql:host=localhost;dbname=database","root","");
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			$email = $_POST["email"];
			$firstname = $_POST["firstname"];
			$lastname = $_POST["lastname"];
			$password = md5($_POST["password"]);
			$result=$db->prepare("select email from users where email='$email'");
			$result->execute();
			if($result->rowCount()==0){
				//nincs még ilyen user
				

				$result=$db->prepare("insert into users values(0,'$email', '$firstname', '$lastname', '$password')");
				$result->execute();
				
				if($result->rowCount()==1)
					echo "Sikeres regisztráció!";
				else echo "Sikertelen regisztráció!" . $result->errorInfo();
				
			} else {
				//már létezik ilyen user
				echo "Ezzel az e-mail címmel már regisztráltak!";
			}
		}
		
		if($_POST["posttype"]=="login")
		{
			$db=new PDO("mysql:host=localhost;dbname=database","root","");
			$email = $_POST["email"];
			$password = md5($_POST["password"]);
			$result=$db->prepare("select * from users where email='$email' and password='$password'");
			$result->execute();
			
			if($result->rowCount()==1) {
				//sikeres bejelentkezés
				$_SESSION["email"]=$email;
				$result=$result->fetch(PDO::FETCH_OBJ);
				$_SESSION["firstname"]=$result->firstname;
				$_SESSION["lastname"]=$result->lastname;
				echo "Sikeres bejelentkezés!" . $_SESSION["email"];
			}
			else {
				//sikertelen bejelentkezés
				echo "Hibás felhasználónév/jelszó!";
			}
			
		}
	}

?>

<html>
	<head>
	
	</head>
	
	<body>
		
		<form method="post" action="">
			E-mail: <input type="email" name="email" id="email"> <br>
			Családnév: <input type="textbox" name="firstname" id="firstname"> <br>
			Keresztnév: <input type="textbox" name="lastname" id="lastname"> <br>
			Jelszó: <input type="password" name="password" id="password"> <br>
			<input type="submit" value="Regisztráció">
			<input type="hidden" value="register" id="posttype" name="posttype">
		</form>
		
		<form method="post" action="">
			E-mail: <input type="email" name="email" id="email"> <br>
			Jelszó: <input type="password" name="password" id="password"> <br>
			<input type="submit" value="Bejelentkezés">
			<input type="hidden" value="login" id="posttype" name="posttype">
		</form>
		
	</body>
</html>