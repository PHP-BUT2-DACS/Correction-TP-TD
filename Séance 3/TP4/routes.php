<?php

use controllers\IndexController;
use framework\Method;
use framework\Route;

// Contain all the routes
return [
    // Create a new GET route linked to the /api route
    new Route(Method::GET, '/api', IndexController::class, 'index')
];