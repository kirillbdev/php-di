<?php
/**
 * Plugin Name: My Plugin
 * Plugin URI:
 * Description: My DI plugin
 * Version: 1.0.0
 * Author: kirillbdev
 * Tested up to: 5.7
 */

define('MY_PLUGIN_DIR', plugin_dir_path(__FILE__));

require_once __DIR__ . '/vendor/autoload.php';

use kirillbdev\MyPlugin\Services\OrderService;
use kirillbdev\MyPlugin\Foundation\FileLogger;
use kirillbdev\MyPlugin\Contacts\LoggerInterface;
use kirillbdev\MyPlugin\Foundation\WPContainer;

$dependencies = [
    OrderService::class => function ($container) {
        return new OrderService($container->make(LoggerInterface::class));
    },
    LoggerInterface::class => function ($container) {
        return new FileLogger();
    }
];

WPContainer::instance($dependencies);

add_action('init', function () {
    $orderService = WPContainer::instance()->make(OrderService::class);

    $orders = $orderService->getOrders();
});