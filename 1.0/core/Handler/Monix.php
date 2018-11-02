<?php 
/** 
  * Monix frameworks start from this file, it is a Core controller that provides all basic method to all controllers declared
  * in root folder controller. Don't create new method or edit functionality from this file or there will be error in other classes
  * Edit may cause improper behaviour / log / warning
  * Created 22 oct 2018 by Rusdi 
**/ 
class Monix
{
    public $data;
    public $_data;

    // core engine framework
    public function __construct()
    {
        echo 'start construct from monix';
        // die;
    }

    // Magic function
    // public function __set($name,$val)
    // {
    //     $this->data[$name] = $val;
    // }

    // public function __get($name)
    // {
    //     if (array_key_exists($name, $this->data)) {
    //         return $this->data[$name];
    //     } else {
    //         exception_handle('unset variable bro');
    //         die;
    //     }
    // }

    // setter for $this->data
    public function setdata($param = array()) { $this->_data = $param; }

    public function curl()
    {
        echo 'start curl from monix'.HR;
        die;
    }

    public function loadView($path = null, $data = array())
    {

        $base_path = str_replace('core' . DS . 'Handler','', __DIR__ );
        $view_base_path = $base_path . 'views' . DS;
        if (! empty($data)) 
        {
            foreach ($data as $k => $val) 
            {
                // declare dynamic variable
                ${"$k"} = $val;
            }
        }

        $readfile = include_once($view_base_path . $path . '.php');
        return $data;
    }

    
}

?>