<?php

spl_autoload_register('myClassAutoLoader');

function myClassAutoLoader($className){
		
	$path = '/classes/';
		
    $extension = ".class.php";
    $fullPath = __DIR__ . $path . $className . $extension;
    
	//check file not found
    if(!file_exists($fullPath)){
        return false;
    }
    
    include_once($fullPath);
}

?>