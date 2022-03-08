<?php


$path=preg_replace('/wp-content.*$/','',__DIR__);
require_once($path.'wp-load.php');

if (function_exists('formx'))
{ echo 'Welcome to the process page';} else {echo 'Not working';}



?>