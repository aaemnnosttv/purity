<?php return

function ($iterable, $callback, $initial = null) {
    return array_reduce($iterable, $callback, $initial);
};