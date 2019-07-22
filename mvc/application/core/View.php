<?php

class View
{
    public function render($view_name, $data = null,$element = null)
    {
        include 'application/views/main.php';
    }
}