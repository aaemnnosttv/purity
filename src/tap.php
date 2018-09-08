<?php return

function ($given, $callback) {
    $callback($given);

    return $given;
};