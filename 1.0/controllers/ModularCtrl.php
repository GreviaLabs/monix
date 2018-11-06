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

    public function index()
    {
        $param = NULL;
        $this->loadView('modular.index',$param);        
    }

    public function about()
    {
        // debug('kacau',1);
        $param = NULL;
        $param['PAGE_TITLE'] = 'Tentang Kami';
        $this->loadView('modular.about',$param);        
    }

    public function multislug()
    {
        $param = NULL;
        $param['PAGE_TITLE'] = 'Multi slug testing page';
        $this->loadView('modular.multislug',$param);        
    }

    public function architecture()
    {
        // debug('kacau',1);
        $param = NULL;
        $param['PAGE_TITLE'] = 'Tentang Kami';
        $this->loadView('modular.architecture',$param);        
    }

    public function hello()
    {
        // echo 'modularctrl from readme';
        echo 'hello from hello'. HR .' index : '.$this->index;

        // die;
    }
}
?>