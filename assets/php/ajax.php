<?php

	include 'class/classIles.php';

	$iles_obj = new iles();

	//get ile
	$getCompagnie = $_POST['getCompagnie'];

	//get villes by ile
	$res_getcity = $iles_obj->getSectionByCompagnie($getCompagnie);


	echo $res_getcity;

