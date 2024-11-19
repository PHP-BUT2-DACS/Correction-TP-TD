<?php

/* Code from internet, automatically load classes if they are currently not loaded */

// https://www.php.net/manual/en/language.oop5.autoload.php

spl_autoload_register(function ($className) {
    $filename = __DIR__ . DIRECTORY_SEPARATOR . str_replace('\\', '/', $className) . '.php';
    if (file_exists($filename)) require_once($filename);
});