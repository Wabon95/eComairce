<?php

namespace eComairce\Repositories;

use eComairce\Entities\User;
use eComairce\Utils\Database;
use eComairce\Utils\FlashMessage;

class UserRepository
{
    public static function insert(User $user) : User | bool
    {
        if ($user->validator()) {
            if (!self::findByEmail($user->getEmail())) {
                $sql = "
                    INSERT INTO `user` (email, password)
                    VALUES (:email, :password)
                ";
                $stmt = Database::getPDO()->prepare($sql);
                $stmt->execute([
                    ':email' => $user->getEmail(),
                    ':password' => password_hash($user->getPassword(), PASSWORD_BCRYPT)
                ]);
                $user->setId(Database::getPDO()->lastInsertId());
                FlashMessage::add('success', 'Votre compte a correctement été créer, vous pouvez dès à présent vous connecter.');

                return $user;
            }
            FlashMessage::add('danger', 'Cette adresse email est déjà utilisée.');

            return false;
        }
        
        return false;
    }

    public static function findByEmail(string $email) : User | bool
    {
        $sql = "
            SELECT *
            FROM `user`
            WHERE email = ?
        ";
        $stmt = Database::getPDO()->prepare($sql);
        $stmt->execute([strip_tags($email)]);

        if ($userFromDB = $stmt->fetch()) {
            $user = new User();
            $user
                ->setId($userFromDB['id'])
                ->setEmail($userFromDB['email'])
                ->setPassword($userFromDB['password'])
                ->setType($userFromDB['type'])
            ;
            
            return $user;
        }

        return false;
    }
}