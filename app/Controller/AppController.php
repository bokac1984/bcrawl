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
//        if (!$this->Linkedin->isConnected()) {
//            $this->Linkedin->connect(array(
//                'prefix' => null,
//                'plugin' => null,
//                'controller' => 'users',
//                'action' => 'index'
//            ));
//        }
//        if (!$this->Linkedin->isConnected() ) {
//            if ($this->request->params['action'] != "login"
//                  )
//                $this->redirect(array('controller' => 'users', 'action' => 'login'));
//        }
//        if (!$this->Linkedin->isConnected()) {) && $this->request->params['action'] == "login"
//            $this->set('connected', true);
//        } else {
//            $this->set('connected', false);
//            debug($this->request->params);exit();
////            $this->redirect(array('controller' => 'users', 'action' => 'login'));
//        }    
    }
}
