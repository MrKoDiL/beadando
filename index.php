<?php
	session_start();
	//Front Controller
	if(isset($_GET["page"]))
	{
		$page="pages/" . $_GET["page"] . ".php";
	}
?>
<html>
	
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Sajókaza Község Honlapja</title>
	</head>
	<body>
		<div id="wrapper">
		
		<header>
		HEADER
		<?php
			if(!isset($_GET["page"])) {
				HEADER("Location: index.php?page=fooldal");
			}
			if(!isset($_SESSION["email"])) 
			{
				echo "<a href='index.php?page=login'>Bejelentkezés</a>";
				
			}
			else echo "Bejelentkezett: " . $_SESSION["firstname"] . $_SESSION["lastname"] . "(". $_SESSION["email"] . ")" . "<a href=logout.php> Kijelentkezés</a>";
		?>
		</header>
		
		<nav>
			<div class=<?php if($_GET["page"]=="fooldal") echo "menu-selected"; else echo "menu-option";?>><a href="index.php?page=fooldal">Föoldal</a></div>

			<div class=<?php if($_GET["page"]=="intezmenyek") echo "menu-selected"; else echo "menu-option";?>><a href="index.php?page=intezmenyek">Intézmények</a></div>
			
			<div class=<?php if($_GET["page"]=="galeria") echo "menu-selected"; else echo "menu-option";?>><a href="index.php?page=galeria">Galéria</a></div>
		
			<div class=<?php if($_GET["page"]=="kapcsolat") echo "menu-selected"; else echo "menu-option";?>><a href="index.php?page=kapcsolat">Kapcsolat</a></div>
		
		</nav>
		
		<div id="content">
			<?php
				if(file_exists($page))
				{
					include($page);
				}
				else include ("pages/404.php");
			
			?>
		</div>
		
		<footer>
		EREDETI OLDAL: <a href="http://sajokaza.hu/">http://sajokaza.hu/</a>
		</footer>
	 </div>
	</body>

</html>