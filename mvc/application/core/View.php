<?php

class View
{
    public function render($view_name, $data = null)
    {
        include 'application/views/main_view.php';
    }
}