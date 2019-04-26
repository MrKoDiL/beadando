<?php

?>

<html>
	<body>
	<h3>Videók</h3>
		<article id="videos"> 

			<iframe width="560" height="315" src="https://www.youtube.com/embed/By8OY6WTVE8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<video width="560" height="315" class="video" controls="true">
				<source src="gallery/videos/got.mp4" type="video/mp4" >
				</video>
		</article> <hr>
		<h3>Képek</h3>
		<?php
		if(isset($_SESSION["email"]))
		{
			echo "<form action='upload.php' method='post' enctype='multipart/form-data'>
			<input type='file' name='img' id='img'>
			<input type='submit' value='Feltöltés'>
		</form>
		<article id='photos'>";
		} else echo "<h2>Kép feltöltéséhez kérlek jelentkezz be!</h2>";
		?>
		<?php
		$galleryDir = "gallery/images/";
		
		foreach(glob("$galleryDir{*.jpg, *.jpeg, *.gif, *.png}", GLOB_BRACE) as $photo) {
			echo "<a href='$photo'>";
			echo "<img height=150 width=150 border=2 src='$photo'>";
			echo "</a>";
		}
		?>
		</article>
	</body>

</html>			