<?php
echo $this->Html->div('alert alert-' . $key . ' alert-dismissible fade show', 
    $message . 
    $this->Html->link(
        $this->Html->tag('span', '&times;', array('aria-hidden' => "true")),'#',
        array('class' => "close", 'data-dismiss' => "alert", 'aria-label' => "Close", 'escape' => false)
    )
);
