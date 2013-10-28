<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {
    	
    /*public $components = array(
        'Session',
        'RequestHandler',
        'Cookie',
        'Security',
        'Linkedin.Linkedin' => array(
            'key' => 'be9ot0r9emr5',
            'secret' => 'napYjSziilUJZq60'
        )
    );*/
    
    public $helpers = array(
        'Html', 
        'Form', 
        'Session', 
        'Js'
    );
	 public $components = array(
        'Acl',
        'Auth' => array(
            'authorize' => array(
                'Actions' => array('actionPath' => 'controllers')
            )
        ),
        'Session'
    );
    //public $helpers = array('Html', 'Form', 'Session');

    public function beforeFilter() {
        //Configure AuthComponent
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
        $this->Auth->loginRedirect = array('controller' => 'posts', 'action' => 'add');
		$this->Auth->allow('display');
    }
    
//    public function beforeFilter() {
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
//   }
}
