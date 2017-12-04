<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Helpme extends Application
{
    
    /**
     * Ctor
     */
    function __construct() {
        parent::__construct();
    }
    
    /**
     * Default entry point of this controller.
     */
    public function index()
    {
        $this->data['pagebody'] = 'homepage';
        $this->data['pagetitle'] = 'Help Wanted!';
        $stuff = file_get_contents(DATAPATH.'jobs.md');
        $this->data['content'] = $this->parsedown->parse($stuff);
        $this->render();
    }

}
?>
