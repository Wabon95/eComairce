<?php

namespace eComairce\Utils;

use eComairce\Entities\User;
use eComairce\Utils\FlashMessage;
use eComairce\Repositories\UserRepository;

abstract class SessionManager
{

    public static function connectUser(string $email, string $password) : User | bool
    {
        if ($user = UserRepository::findByEmail(strip_tags($email))) {
            if (password_verify(strip_tags($password), $user->getPassword())) {
                $_SESSION['user'] = [
                    'id' => $user->getId(),
                    'email' => $user->getEmail(),
                    'password' => $user->getPassword(),
                    'type' => $user->getType()
                ];
                return $user;
            }
            FlashMessage::add('warning', "Mot de passe incorrect.");

            return false;
        }
        FlashMessage::add('warning', "Aucun email correspondant trouvé.");

        return false;
    }

    public static function getConnectedUser() : User | bool
    {
        if (isset($_SESSION['user'])) {
            $user = new User();
            $user
                ->setId($_SESSION['user']['id'])
                ->setEmail($_SESSION['user']['email'])
                ->setPassword($_SESSION['user']['password'])
                ->setType($_SESSION['user']['type'])
            ;
            return $user;
        }

        return false;
    }

    public static function disconnectUser()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
    }

}