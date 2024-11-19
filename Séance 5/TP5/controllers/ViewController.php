<?php

namespace controllers;

use framework\Response;
use framework\ResponseType;
use framework\View;

/**
 * Basic HTTP controller
 */
class ViewController {
    /**
     * Route linked to /index
     *
     * @param array $request
     * @return Response
     */
    function index(array $request) : Response {
        $vars = [
            "nom" => "Julien",
            "ma_var" => 3,
            "items" => [
                1,
                2
            ]
        ];
        return new View("index.dacs", $vars);
    }
}