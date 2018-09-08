<?php return

function ($iterable, $callback) {
    $keys = array_keys($iterable);

    return array_combine(
        array_keys($iterable),
        array_map($callback, $iterable, $keys)
    );
};