<?php

namespace eComairce\Utils;

abstract class FlashMessage{
    private array $messages;

    public static function add(string $type, string $message)
    {
        $_SESSION['flashMessages'][] = [
            'type' => $type,
            'message' => $message
        ];
    }

    public static function removeAllMessages()
    {
        unset($_SESSION['flashMessages']);
    }

    public static function getMessages() : array
    {
        if (isset($_SESSION['flashMessages'])) {
            return $_SESSION['flashMessages'];
        }

        return [];
    }
}