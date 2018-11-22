<?php

class Config {
    private static $path = "http://localhost:8081/";

    static function getPathAPI() {
        return self::$path;
    }

}

?>