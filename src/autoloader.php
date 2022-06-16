<?php

spl_autoload_register( function(string $className) {
    $fileName = __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';

    if(file_exists($fileName)) {
        include $fileName;
    }
});
