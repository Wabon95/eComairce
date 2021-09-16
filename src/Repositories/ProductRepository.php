<?php

namespace eComairce\Repositories;

use eComairce\Utils\Database;
use eComairce\Entities\Product;
use eComairce\Utils\FlashMessage;

class ProductRepository
{
    public static function insert(Product $product) : Product | bool
    {
        if ($product->validator()) {
            $sql = "
                INSERT INTO `product` (name, slug, description, price)
                VALUES (:name, :slug, :description, :price)
            ";
            $stmt = Database::getPDO()->prepare($sql);
            $stmt->execute([
                ':name' => $product->getName(),
                ':slug' => $product->getSlug(),
                ':description' => $product->getDescription(),
                ':price' => $product->getPrice()
            ]);
            $product->setId(Database::getPDO()->lastInsertId());
            FlashMessage::add('success', 'Le produit à correctement été ajouté.');

            return $product;
        }
        
        return false;
    }

    public static function find(int $id) : Product | bool
    {
        $sql = "
            SELECT *
            FROM `product`
            WHERE id = :id
        ";
        $stmt = Database::getPDO()->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);

        if ($p = $stmt->fetch()) {
            $product = new Product();
            $product
                ->setId($p['id'])
                ->setName($p['name'])
                ->setDescription($p['description'])
                ->setPrice($p['price'])
            ;

            return $product;
        }

        return false;
    }

    public static function findBySlug(string $slug) : Product | bool
    {
        $sql = "
            SELECT *
            FROM `product`
            WHERE slug = :slug
        ";
        $stmt = Database::getPDO()->prepare($sql);
        $stmt->execute([
            ':slug' => $slug
        ]);

        if ($p = $stmt->fetch()) {
            $product = new Product();
            $product
                ->setId($p['id'])
                ->setName($p['name'])
                ->setDescription($p['description'])
                ->setPrice($p['price'])
            ;

            return $product;
        }

        return false;
    }

    public static function findAll() : array | bool
    {
        $sql = "
            SELECT *
            FROM `product`
        ";
        $stmt = Database::getPDO()->prepare($sql);
        $stmt->execute();
        $products = [];

        if ($productsFromDB = $stmt->fetchAll()) {
            foreach ($productsFromDB as $p) {
                $product = new Product();
                $product
                    ->setId($p['id'])
                    ->setName($p['name'])
                    ->setDescription($p['description'])
                    ->setPrice($p['price'])
                ;
                $products[] = $product;
            }
            
            return $products;
        }

        return false;
    }
}