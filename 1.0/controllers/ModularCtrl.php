<?php
class ModularCtrl extends Monix
{

    public $index = 'dari index';
    public $data = array();

    public function __construct($_index = NULL)
    {
        $this->index = $_index;
        // debug('Hello from constructor Modularctrl'.HR);
    }

    public function readme()
    {
        // echo 'modularctrl from readme';
        // echo 'helloworld from readme'. HR .' index : '.$this->index;
        // $this->_data['testing'] = 
        $param['mantabjiwa'] = 'yamete';
        $this->loadView('hello',$param);
        // die;
    }

    public function hello()
    {
        // echo 'modularctrl from readme';
        echo 'hello from hello'. HR .' index : '.$this->index;

        // die;
    }
}
?>