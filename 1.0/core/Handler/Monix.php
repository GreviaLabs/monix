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
    public $db;

    // load class session
    public $session;

    // core engine framework
    public function __construct() {
        // echo 'start construct from monix';
        // die;
        $this->db = new Db();
        $this->session = new Session();
        $this->cookies = new Cookies();
    }
    
    // prepare var db for class db
    public function db($_db) {
        $this->db = $_db;
    }

    public function session($_session) {
        $this->session = $_session;
    }

    public function cookies($_cookies) {
        $this->session = $_cookies;
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

    public function curl() {
        echo 'start curl from monix'.HR;
        die;
    }

    /*
     * Load View from folder: view
     * ---------------
     * USAGE $path:
     * - folder inside path can be used as . (dot) or / (slash)
     * - file extension must be .php
     * 
     * USAGE $data:
     * - type data must be array
     * - every key value will be variable & val will be value of variable
     * 
     * example : loadView('modular.index');
     * will be find folder views, then folder modular and file index.php
     */
    public function loadView($path = null, $data = array())
    {
        // set variable for exception handle
        $this_file_path = 'Handler' . DS . 'Monix.php' ;
        
        // check path contain . or not
        if (isset($path) && strpos($path,'.') !== FALSE) {
            $path = str_replace('.',DS,$path);
        }

        $base_path = str_replace('core' . DS . 'Handler','', __DIR__ );
        $view_base_path = $base_path . 'views' . DS;
        if (! empty($data)) {
            foreach ($data as $k => $val) {
                // declare dynamic variable
                ${"$k"} = $val;
            }
        }

        $readfile = $view_base_path . $path . '.php';

        if (file_exists($readfile)) {
            $readfile = include_once($readfile);
        } else {
            // exception file not exist
            exception_handle('VIEW_FILE_NOT_FOUND', $this_file_path);
        }
        return $data;
    }

    
}

?>