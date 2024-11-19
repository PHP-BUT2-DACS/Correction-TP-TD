<?php

// Import the autoloader, which loads all the namespaces and classes
require(__DIR__ . '/../autoloader.php');

use framework\Method;
use framework\Response;
use framework\ResponseType;

// Import the route array
$routes = require(__DIR__ . '/../routes.php');


// Get the URI called with the request
$endpoint = $_SERVER['REQUEST_URI'];

// Get the METHOD called with the request
$method = Method::from($_SERVER['REQUEST_METHOD']);

// The response is null by default, meaning no associated route was found
$response = null;

// Tries to find the associated route to the request
foreach ($routes as $route) {
    // If the request endpoint and method are equals the current route
    if ($route->endpoint == $endpoint && $route->method == $method) {
        // An associated route was found

        // Create a new instance of the controller
        $controller = new $route->controller;

        // Call the function linked to the route and controller
        // And passes the request as a parameter
        $response = $controller->{$route->function}($_REQUEST);

        // Leave the loop
        break;
    }
}

// If no associated route was found
if (empty($response)) {
    // Create a 404 response
    $response = new Response(
        ResponseType::HTML,
        "<p>Erreur 404</p>",
        404
    );
}

// Set the HTTP response code
http_response_code($response->code);

// Handle different response types
switch ($response->type) {
    case ResponseType::HTML:
        // Print the HTML
        echo $response->content;
        break;

    case ResponseType::JSON:
        // Set the content-type header
        header('Content-type: application/json');

        // Print the encoded JSON
        echo json_encode($response->content);
        break;
}