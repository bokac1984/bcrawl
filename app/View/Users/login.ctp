<?php
echo $this->Html->link("LinkedIn",
        array(
            'controller'=>'users',
            'action'=>'dashboard'
        ), 
        array('escape' => true)
        );
?>
