<?php return static function ($factory) {
    return $factory->tap(new class implements IteratorAggregate {
        protected static $factory;
        protected $items = [];

        public function __construct($items = [])
        {
            $this->items = $items;
        }

        public function each($callback)
        {
            static::$factory->each($this->items, $callback);

            return $this;
        }

        public function filter($callback)
        {
            return new static(static::$factory->filter($this->items, $callback));
        }

        public function reduce($callback, $initial = null)
        {
            return array_reduce($this->items, $callback, $initial);
        }

        public function all()
        {
            return $this->items;
        }

        /**
         * Get an iterator for the items.
         *
         * @return \ArrayIterator
         */
        public function getIterator()
        {
            return new ArrayIterator($this->items);
        }

        /**
         * @internal
         */
        public static function setFactory($factory)
        {
            static::$factory = $factory;
        }
    },
    function ($collection) use ($factory) {
        $collection->setFactory($factory);
    });
};