<?php
echo $this->Html->link("LinkedIn",
        array(
            'controller'=>'users',
            'action'=>'LinkedinLogin'
        ), 
        array('escape' => true)
        );
?>