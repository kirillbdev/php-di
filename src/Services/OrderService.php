<?php

namespace kirillbdev\MyPlugin\Services;

use kirillbdev\MyPlugin\Contacts\LoggerInterface;

if ( ! defined('ABSPATH')) {
    exit;
}

class OrderService
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function getOrders() : array
    {
        $this->logger->log('Sample log');

        return [];
    }
}