<?php

namespace controllers;

use framework\Response;
use framework\ResponseType;

/**
 * Basic HTTP controller
 */
class IndexController {
    /**
     * Route linked to /api
     *
     * @param array $request
     * @return Response
     */
    function index(array $request) : Response {
        var_dump($request);

        return new Response(ResponseType::HTML, "<p>test</p>");
    }
}