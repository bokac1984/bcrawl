<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {
    	
    public $components = array(
        'Session',
        'RequestHandler',
        'Cookie',
        'Security',
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
        if (!$this->Linkedin->isConnected()) {
            $this->set('connected', true);
        } else {
            $this->set('connected', false);
            debug($this->request);exit();
//            $this->redirect(array('controller' => 'users', 'action' => 'login'));
        }    
    }
}
