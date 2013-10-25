<?php

App::uses('LinkedinComponent', 'Linkedin.Controller/Component');
/**
 * Description of LinkedinSearchComponent
 *
 * @author bokac
 */
class LinkedinSearchComponent extends LinkedinComponent {
    //put your code here
    /**
     * construct plugin with supplied key and secret
     *
     * @param $controller
     * @param array $settings
     */
    public function __construct(ComponentCollection $collection, $settings = array()) {
            parent::__construct($collection, $settings);
            $this->key = $settings['key'];
            $this->secret = $settings['secret'];
    }

    /**
     * Initialize plugin with supplied key and secret
     *
     * @param $controller
     * @param array $settings
     */
    function initialize(&$Controller){
            $this->controller = $Controller;
    }
    
    /**
     * API call to GET linkedin data.
     *
     * @param $path
     * @param $args
     * @return response
     */
    public function call($path, $args, $keywords) {
            $accessToken = $this->Session->read($this->sessionAccess);
            if ($accessToken === null) {
                    trigger_error('Linkedin: accesToken is empty', E_USER_NOTICE);
            }
            $path .= $this->_fieldSelectors($args);
            $consumer = $this->_createConsumer();
            //$path .= ':(companies:(id,website-url))?keywords=law&count=2&start=5';
            //debug($this->apiPath . $path);exit();
            $result = $consumer->get($accessToken->key, $accessToken->secret, $this->apiPath . $path);
            $response1 = simplexml_load_string($result);
            //$responseHeaders = $consumer->getResponseHeader();
            $response = $this->_decode($response1);
            if (isset($response['error'])) {
                    throw new Exception('Linkedin: '.$response['error']['message']);
            }
            return $response;
    }
}
