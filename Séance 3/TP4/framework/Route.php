<?php

namespace framework;

class Route {
    /**
     * HTTP Method
     *
     * @var Method
     */
    public Method $method;

    /**
     * URL which links the route
     *
     * @var string
     */
    public string $endpoint;

    /**
     * Controller linked to the route
     *
     * @var string
     */
    public string $controller;

    /**
     * Function that handles the endpoint
     *
     * @var string
     */
    public string $function;

    /**
     * Create a route
     *
     * @param Method $method
     * @param string $endpoint
     * @param string $controller
     * @param string $function
     * @return void
     */
    public function __construct(Method $method, string $endpoint, string $controller, string $function)  {
        $this->method = $method;
        $this->endpoint = $endpoint;
        $this->controller = $controller;
        $this->function = $function;
    }
}

