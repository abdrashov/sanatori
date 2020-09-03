<?php
	$connection = mysqli_connect($datebase[0], $datebase[1], $datebase[2], $datebase[3]);
	if ($connection == false)
	{
		echo "хз";
		exit();
	}

	mysqli_set_charset($connection, 'utf8');
	mysqli_character_set_name($connection);


?>