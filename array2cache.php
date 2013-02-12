<?php
		
	function arr2_fsave($array, $name, $dir = '') {
		
		$cfile = arr2_fname($name, $dir);
		$code = arr2_code($array, $name);
		
		echo $cfile;

		if (file_put_contents($cfile, $code) > 0)
			return $cfile; // return name file	

	}

	
	function arr2_fload($name, $dir = '') {
		
		$cfile = arr2_fname($name, $dir);
		
		if (file_exists($cfile)){
			include($cfile);
			return $$name;
		}

		return null;
	} 

	
	function arr2_fname($name, $dir = ''){
		
		if ($dir == '' and defined('CACHEDIR'))
			$dir = CACHEDIR.'arrays/';

		if (!is_dir($dir)){
			if (!mkdir($dir, 0777, True))
				return False;
		}		

		return $dir.$name.'.php';

	}

	
	function arr2_code($array, $name, $tag = True){
		
		$code  = '$'.$name.'='.var_export($array, True);
		
		if ($tag)
			$code = '<?php '.$code.'?>';
		
		return $code;	

	}