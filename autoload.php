<?php

declare(strict_types=1);

spl_autoload_register(function (string $class) {
    $vendorName = 'src' . DIRECTORY_SEPARATOR; // в вендорах пришлось добавить separator т.к. replace подменял
    $namespaceVendorName = 'App' . DIRECTORY_SEPARATOR; // все включения App, так Application становился srclication
    $class = str_replace(array('\\', $namespaceVendorName), array(DIRECTORY_SEPARATOR, $vendorName), $class);
    $path = __DIR__ . "/{$class}.php";
    if (is_readable($path)) {
        require_once $path;
    }
});
