<?php 
// require_once( __DIR__ . '../Monix.php');
require_once('Monix.php');

class Controller extends Monix {
    public function __construct() {
        $this->db(new Db());
    }
}

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