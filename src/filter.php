<?php return

function ($iterable, $callback = null) {
    if (! $callback) {
        return array_filter($iterable);
    }

    return array_filter($iterable, $callback, ARRAY_FILTER_USE_BOTH);
};