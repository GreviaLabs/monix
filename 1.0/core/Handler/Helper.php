<?php 

// DIR always from root folder due to load from core.php
// $dir = __DIR__ ;
// echo DIR;die;
// echo $dir;die;
// require_once($dir.'helpers'.DS.'helper.php');
// require_once($dir.'/helpers'.DS.'helper.php');
// require_once('helpers'.DS.'helper.php');
require_once('helpers/helper.php');


// debug('Helper1',1);

    
    
    // load helper file
    $helper = array();
    $helper['autoload'] = array('http', 'string', 'url');
    
    if (! empty($helper['autoload'])) 
    {
        foreach ($helper['autoload'] as $help) {
            if (file_exists('helpers/'.$help.'.php')) 
                require_once('helpers/'.$help.'.php');
        }
    }

?>