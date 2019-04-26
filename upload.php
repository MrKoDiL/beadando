<?php
	$uploadDir = "gallery/images/";
	
	$fileDestinationPath = $uploadDir . basename($_FILES["img"]["name"]);
	$fileType = strtolower(pathinfo($fileDestinationPath, PATHINFO_EXTENSION));
	$isImage = getimagesize($_FILES["img"]["tmp_name"]);
	
	if($isImage !== false)
	{
		if(!file_exists($fileDestinationPath))
		{
			if($_FILES["img"]["size"] < 5242880) {
				if($fileType == "jpg" || $fileType == "png" | $fileType == "jpeg" || $fileType == "gif" ) {
					if (move_uploaded_file($_FILES["img"]["tmp_name"], $fileDestinationPath)) {
						header("location: index.php?page=galeria");
					} else echo "Sikertelen feltöltés.";
				} else echo "Nem támogatott kép formátum.";
			} else echo "Maximum 5mb lehet a kép.";
		} else echo "A feltöltendő fájl már létezik!";
	}
?>