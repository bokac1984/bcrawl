<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {
    
    public $inConnected;
    
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
        'Session',
        'RequestHandler',
        'Cookie',
        'Linkedin.Linkedin' => array(
            'key' => 'be9ot0r9emr5',
            'secret' => 'napYjSziilUJZq60'
        )
    );

    public function beforeFilter() {
        //Configure AuthComponent
        $this->Auth->autoRedirect = false;
        $this->Auth->loginAction = array(
                'prefix' => null,
                'plugin' => null,
                'controller' => 'users',
                'action' => 'login'
            );
        $this->Auth->logoutRedirect = array(
                'prefix' => null,
                'plugin' => null,
                'controller' => 'users',
                'action' => 'login'
            );
        $this->Auth->authError = __('Not allowed');
        $this->Auth->loginError = __('Invalid Username or Password entered, please try again.');

        
        $this->Cookie->name = Configure::read('Website.cookie.name');
        $this->checkCookie();
        
        $this->inConnected = $this->checkLinkedinConnection();
        $this->set('inConnected', $this->inConnected);
    }

    protected function checkCookie() {
        if ($this->Auth->user() == null) {
            $user = $this->Cookie->read('User');
            
            if (!empty($user) && $this->Auth->login($user)) {
                $this->redirect($this->Auth->redirect());
            }
        }
    }
    
    public function checkLinkedinConnection() {
        return $this->Linkedin->isConnected();
    }
}
