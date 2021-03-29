<?php

namespace kirillbdev\MyPlugin\Foundation;

if ( ! defined('ABSPATH')) {
    exit;
}

class Container
{
    private static $instance;

    private $dependencies = [];

    private function __construct($dependencies = [])
    {
        $this->dependencies = $dependencies;
    }

    public static function instance($dependencies = [])
    {
        if (null === self::$instance) {
            self::$instance = new self($dependencies);
        }

        return self::$instance;
    }

    public function has(string  $id) : bool
    {
        return isset($this->dependencies[ $id ]);
    }

    /**
     * @param string $id
     * @return mixed
     * @throws \Exception
     */
    public function get(string $id)
    {
        if ($this->has($id)) {
            return $this->resolve($id);
        }
        else {
            throw new \Exception("Dependency $id not found.");
        }
    }

    public function make(string  $id)
    {
        try {
            return $this->get($id);
        }
        catch (\Exception $e) {
            return new $id();
        }
    }

    private function resolve(string $id)
    {
        return call_user_func($this->dependencies[ $id ], $this);
    }
}