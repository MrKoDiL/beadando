<?php

	echo "Ez a galeria";
?>

<html>
	<body>
		<article id="videos"> 
			<embed src="gallery/videos/got.mp4"> <br>
			<iframe width="560" height="315" src="https://www.youtube.com/embed/By8OY6WTVE8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		
		</article>

		<article id="photos">
		<?php
		$galleryDir = "gallery/images/";
		
		foreach(glob("$galleryDir{*.jpg, *.jpeg, *.gif, *.png}", GLOB_BRACE) as $photo) {
			echo "<a href='$photo'>";
			echo "<img src='$photo'>";
			echo "</a>";
		}
		?>
		</article>
	</body>

</html>