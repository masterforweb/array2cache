<?php
	
	function arr2_fsave($array, $name, $dir = '') {
		
		$cfile = ar2c_fname($name, $dir);
		$code = '<?php $array='.var_export($array, True).'?>';
		
		return file_put_contents($cfile, $code);	

	}

	function arr2_fload($name, $dir) {
		
		$cfile = arr2_fname($name, $dir = '');
		
		if (file_exists($cfile)){
			include($cfile);
			return $array;
		}

		return null;
	} 


	function arr2_fname($name, $dir = ''){
		
		if ($dir == '' and defined('CACHE_DIR'))
			$dir = CACHE_DIR;

		return $dir.'arrays/'.sha1($name).'.php';
	}

