<?php

namespace kirillbdev\MyPlugin\Contacts;

if ( ! defined('ABSPATH')) {
    exit;
}

interface LoggerInterface
{
    public function log(string $message);
}