<?php

namespace kirillbdev\MyPlugin\Foundation;

use kirillbdev\MyPlugin\Contacts\LoggerInterface;

if ( ! defined('ABSPATH')) {
    exit;
}

class FileLogger implements LoggerInterface
{
    public function log(string $message)
    {
        file_put_contents(MY_PLUGIN_DIR . '/logs.txt', $message . PHP_EOL);
    }
}