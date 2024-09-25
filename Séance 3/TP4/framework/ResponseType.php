<?php

namespace framework;

/**
 * Represent an HTTP Response type (or content-type)
 */
enum ResponseType: string {
    case HTML = "HTML";
    case JSON = "JSON";
}