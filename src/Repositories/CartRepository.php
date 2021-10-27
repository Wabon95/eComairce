<?php

namespace eComairce\Repositories;

use eComairce\Entities\Cart;
use eComairce\Entities\User;
use eComairce\Utils\Database;
use eComairce\Utils\SessionManager;

abstract class CartRepository
{
    public static function push(User $user, array $products)
    {
        // On vérifie si l'utilisateur n'as pas déjà un panier enregistré en BDD
        $sql = "
            SELECT *
            FROM `cart`
            WHERE id_user = ?
        ";
        $stmt = Database::getPDO()->prepare($sql);
        $stmt->execute([$user->getId()]);

        // Si l'utilisateur a un panier en BDD, on le supprime complètement afin de le remplacer par le nouveau
        if ($stmt->fetch()) {
            $sql = "
                DELETE
                FROM `cart`
                WHERE id_user = ?
            ";
            $stmt = Database::getPDO()->prepare($sql);
            $stmt->execute([$user->getId()]);
        }

        $values = [];
        $placeholders = '';

        foreach ($products as $p) {
            if (!empty($values)) {
                $placeholders .= ', (?, ?, ?)';
            }
            if (empty($values)) {
                $placeholders = '(?, ?, ?)';
            }
            array_push($values, $user->getId(), $p->getId(), $p->quantity);
        }

        $sql = "
            INSERT INTO `cart` (id_user, id_product, quantity)
            VALUES $placeholders
        ";
        $stmt = Database::getPDO()->prepare($sql);
        $stmt->execute($values);
    }

    public static function pull()
    {
        $sql = "
            SELECT *
            FROM `cart`
            WHERE id_user = :id
        ";
        $stmt = Database::getPDO()->prepare($sql);
        $stmt->execute([
            ':id' => SessionManager::getConnectedUser()->getId()
        ]);

        if ($cartFromDB = $stmt->fetchAll()) {
            Cart::init();
            foreach ($cartFromDB as $c) {
                Cart::addProduct(ProductRepository::find($c['id_product']), $c['quantity']); // /!\ Penser à faire une jointure SQL par la suite pour éviter cette requête
            }
            return Cart::getProducts();
        }
        return false;
    }
}