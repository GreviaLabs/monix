<?php 
require_once('Monix.php');

class Model extends Monix {
    public function __construct() {
        $this->db(new Db());
    }
}

// Scan folder controllers
$dir = 'models';
$listdir = scandir($dir);

// load model file
if (! empty($listdir)) 
{
    foreach ($listdir as $ctrl) {      
        if (! in_array($ctrl,array('.','..'))) 
            require_once($dir . '/' . $ctrl);
    }
}

?>