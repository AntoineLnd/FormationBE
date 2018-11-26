<?php

class Api {
    // Adresse de notre api
    private static $path = "http://localhost:3200";
    
    // Acces a l'attribut static $path
    static function gePath() {
        return self::$path;
    }
}
