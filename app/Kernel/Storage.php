<?php

namespace Orchid\Kernel;

class Storage
{
    /**
     * @var
     */
    public $container;
    /**
     * @var null
     */
    protected $configField = null;

    /**
     * TypeStorage constructor.
     */
    public function __construct()
    {
        $types = config($this->configField, []);

        $this->container = collect($types);
    }

    /**
     * @param $class
     */
    public function add($class)
    {
        $this->container->push($class);
    }

    /**
     * @return array
     */
    public function all()
    {
        $this->container->transform(function ($value) {
            if (!is_object($value)) {
                $value = new $value();
            }

            return $value;
        });

        return $this->container->all();
    }

    /**
     * @param $arg
     *
     * @return mixed
     */
    public function get($arg)
    {
        return $this->container->get($arg);
    }

    /**
     * @param $name
     *
     * @return mixed
     */
    public function find($name)
    {
        return $this->container->where('slug', $name)->first();
    }
}
