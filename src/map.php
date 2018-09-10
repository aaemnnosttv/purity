<?php return static function ($factory) {
    return function ($iterable, callable $callback) {
        $keys = array_keys($iterable);

        return array_combine(
            $keys,
            array_map($callback, $iterable, $keys)
        );
    };
};
