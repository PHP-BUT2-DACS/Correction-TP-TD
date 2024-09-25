<?php

namespace framework;

/**
 * Represent an HTTP method
 */
enum Method : string {
    case GET = "GET";
    case POST = "POST";
    case PUT = "PUT";
    case DELETE = "DELETE";
}