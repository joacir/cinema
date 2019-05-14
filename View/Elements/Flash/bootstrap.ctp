<?php
echo $this->Html->div('alert alert-' . $key . ' alert-dismissible fade show', 
    $message . 
    $this->Form->button(
        $this->Html->tag('span', '&times;', array('aria-hidden' => "true")),
        array('type' => "button", 'class' => "close", 'data-dismiss' => "alert", 'aria-label' => "Close")
    )
);
