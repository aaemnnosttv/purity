<?php return

new class {
    protected $cache = [];

    public function __get($name)
    {
        return $this->get($name);
    }

    public function __call($name, $args)
    {
        return $this->get($name)(...$args);
    }

    public function get($name)
    {
        if (empty($this->cache[$name])) {
            $this->cache[$name] = include __DIR__ . "/src/$name.php";
        }

        return clone $this->cache[$name];
    }
};