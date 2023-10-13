<?php

namespace Guirod\MvcTp;

class Controller
{
    // protected function render($view, $data = [])
    // {
    //     extract($data);

    //     include "Views/$view.php";
    // }

    protected function render($view, $data = [], int $httpStatus = 200)
    {
        ob_start();
        extract($data);
        include "Views/$view.php";
        return ob_end_flush();
    }

    protected function renderJson($data = [], int $httpStatus = 200)
    {
        // ob_start();
        // ob_clean();
        header_remove();
        // header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        http_response_code($httpStatus);
        echo json_encode($data);
        
        // return ob_end_flush();
    }
}