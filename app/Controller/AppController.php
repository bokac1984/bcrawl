<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {
    
    public $connectedLinkedin;
    	
    public $components = array(
        'Session',
        'RequestHandler',
        'Cookie',
        'Linkedin.Linkedin' => array(
            'key' => 'be9ot0r9emr5',
            'secret' => 'napYjSziilUJZq60'
        )
    );
    
    public $helpers = array(
        'Html', 
        'Form', 
        'Session', 
        'Js'
    );
    
    public function beforeFilter() {
        if ( !$this->Linkedin->isConnected() ) {
            $this->connectedLinkedin=  false;
        } else {
            $this->connectedLinkedin =  true;
        }
        
        $this->set('connected', $this->connectedLinkedin);
    }
    
}
