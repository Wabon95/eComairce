<?php

namespace eComairce\Controllers;

use eComairce\Entities\User;
use eComairce\Utils\FlashMessage;
use eComairce\Utils\SessionManager;

class CoreController
{
    protected User | bool $connectedUser = false;

    public function __construct()
    {
        $this->connectedUser = SessionManager::getConnectedUser();
    }

    protected function redirect(string $url, string $method = 'GET')
    {
        $_SERVER['REQUEST_METHOD'] = $method;
        header('Location: ' . $url);
    }

    protected function render(string $page, array $params)
    {
        extract($params);
        $flashMessages = FlashMessage::getMessages() ?? null;
        FlashMessage::removeAllMessages();
        $connectedUser = $this->connectedUser;

        require_once __DIR__ . '/../Views/Layouts/Header.php';
        require_once __DIR__ . '/../Views/' . $page . '.php';
        require_once __DIR__ . '/../Views/Layouts/Footer.php';
    }
}