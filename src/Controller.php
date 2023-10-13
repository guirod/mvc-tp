<?php

namespace Guirod\MvcTp;

class Controller
{
    // protected function render($view, $data = [])
    // {
    //     extract($data);

    //     include "Views/$view.php";
    // }

    protected function render($view, $data = [])
    {
        ob_start();
        extract($data);
        include "Views/$view.php";
        return ob_end_flush();
    }
}