<?php return

new class {
    protected $providers = [];
    protected $cache = [];

    public function __get($name)
    {
        return $this->get($name);
    }

    public function __call($name, $args)
    {
        return $this->get($name)(...$args);
    }

    public function new()
    {
        return new class($this) {
            protected $factory;

            public function __construct($factory)
            {
                $this->factory = $factory;
            }

            public function __call($name, $args)
            {
                $class = $this->factory->get($name);

                return new $class(...$args);
            }
        };
    }

    public function get($name)
    {
        if (empty($this->cache[$name])) {
            $this->init($name);
        }

        return clone $this->cache[$name];
    }

    protected function init($name)
    {
        if (empty($this->providers[$name])) {
            if (! file_exists(__DIR__ . "/src/$name.php")) {
                throw new Exception("No provider exists for [$name]");
            }

            $provider = include __DIR__ . "/src/$name.php";

            if (! $provider instanceof \Closure) {
                throw new Exception("Invalid provider for [$name]");
            }

            $this->providers[$name] = $provider;
        }

        $this->cache[$name] = $this->providers[$name]($this);
    }
};