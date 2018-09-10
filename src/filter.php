<?php return static function ($factory) {
    return function ($iterable, callable $callback = null) {
        if ($callback) {
            return array_filter($iterable, $callback, ARRAY_FILTER_USE_BOTH);
        }

        return array_filter($iterable);
    };
};
