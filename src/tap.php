<?php return static function ($factory) {
    return function ($given, $callback) {
        $callback($given);

        return $given;
    };
};
