<?php

	include 'class/section.class.php';

	$iles_obj = new section();

	//get ile
	$getCompagnie = $_POST['getSection'];

	//get villes by ile
	$res_getcompagnie = $iles_obj->getSectionByCompagnie($getCompagnie);


	echo $res_getcompagnie;

