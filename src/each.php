<?php return static function ($factory) {
    return function ($iterable, callable $callback) {
        foreach ($iterable as $k => $v) {
            if ($callback($v, $k) === false) {
                return;
            }
        }
    };
};
