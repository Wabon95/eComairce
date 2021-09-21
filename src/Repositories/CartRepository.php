<?php

namespace eComairce\Repositories;

use eComairce\Entities\Cart;
use eComairce\Utils\Database;
use eComairce\Entities\Product;

class CartRepository
{
    public static function insert(Cart $cart)
    {
        // On vérifie si l'utilisateur n'as pas déjà un panier enregistré en BDD
        $sql = "
            SELECT *
            FROM `cart`
            WHERE id_user = ?
        ";
        $stmt = Database::getPDO()->prepare($sql);
        $stmt->execute([$cart->getUser()]);
        
        $values = [];
        $placeholders = '';

        // Si l'utilisateur a un panier en BDD, on le supprime complètement afin de le remplacer par le nouveau
        if ($stmt->fetch()) {
            $sql = "
                DELETE
                FROM `cart`
                WHERE id_user = ?
            ";
            $stmt = Database::getPDO()->prepare($sql);
            $stmt->execute([$cart->getUser()]);
        }
        
        foreach ($cart->getProducts() as $p) {
            if (!empty($values)) {
                $placeholders .= ', (?, ?, ?)';
            }
            if (empty($values)) {
                $placeholders = '(?, ?, ?)';
            }
            array_push($values, $cart->getUser(), $p->getId(), $p->quantity);
        }
        dd($placeholders);
        $sql = "
            INSERT INTO `cart` (id_user, id_product, quantity)
            VALUES $placeholders
        ";
        $stmt = Database::getPDO()->prepare($sql);
        $stmt->execute($values);
    }
}