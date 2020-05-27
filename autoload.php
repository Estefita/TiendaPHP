<?php

function controllers_autoload($classname){
	//echo $classname;
	$fileName = 'controllers/'.$classname . '.php';
	if (is_file($fileName)) include_once $fileName;	
}

//Esto de abajo es nativo de php
spl_autoload_register('controllers_autoload');
?>