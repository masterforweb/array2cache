<?php


	define('CACHEDIR', __DIR__.'/cache/'); //config

	require 'array2cache.php';
	
	/* save array */
	$myarr = array('1'=>'Sherlock', '2'=>'Watson');
	arr2_fsave($myarr, 'myarr');

	unset($myarr);


	/* load: variant 1 */
	include(CACHEDIR.'arrays/myarr.php');
	echo "\n\nprint_r myarr ------------- \n";
	print_r($myarr);
	echo "\n-----------------------------";


	/* load: variant 2 */
	$cachearr = arr2_fload('myarr');
	echo "\n\nprint_r cachearr -------------- \n";
	print_r($cachearr);
	echo "\n---------------------------------";


