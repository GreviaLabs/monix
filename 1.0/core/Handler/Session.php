<?php 
class Session{
    public $get;
    public $set;

    public function __construct()
    {
        session_start();
    }

    public function set($attr = NULL)
    {
        if (! empty($attr) && is_array($attr)) {
            
            if (count($attr) >= 1) {
                
                foreach ($attr as $kv => $sess) {
                    $_SESSION[$kv] = $sess;
                }
            }
        }
    }

    public function get($name)
    {
        if (! isset($name)) return NULL;

        // foreach ($attr as $kv => $sess) {
        //     $_SESSION[$kv] = $sess;
        // }
        // $result;
        if ($_SESSION[$name]) return $_SESSION[$name]; 
        // return $result
    }
}
?>