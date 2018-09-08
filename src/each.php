<?php return

function ($iterable, $callback) {
    foreach ($iterable as $k => $v) {
        if (false === $callback($v, $k)) {
            return;
        }
    }
};