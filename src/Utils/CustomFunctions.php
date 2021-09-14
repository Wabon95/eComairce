<?php

namespace eComairce\Utils;

abstract class CustomFunctions {

    public static function strip_text(string $text) : string
    {
        return trim(substr($text, 0, 200)) . '...';
    }

}