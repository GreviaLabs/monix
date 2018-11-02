<?php 
// require_once( __DIR__ . '../Monix.php');
require_once('Monix.php');

// Scan folder controllers
$dir = 'controllers';
$listdir = scandir($dir);
// debug($listdir,1);

// load controller file
if (! empty($listdir)) 
{
    foreach ($listdir as $ctrl) {      
        if (! in_array($ctrl,array('.','..'))) 
            require_once($dir . '/' . $ctrl);
    }
}

?>