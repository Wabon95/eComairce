<?php

namespace eComairce\Utils;

use eComairce\Entities\Product;

abstract class CartManager
{
    public static function add(Product $product) : Product
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if (array_key_exists($product->getId(), $_SESSION['cart'])) {
            $_SESSION['cart'][$product->getId()]['quantity']++;

            return $product;
        }

        $_SESSION['cart'][$product->getId()] = [
            'id' => $product->getId(),
            'name' => $product->getName(),
            'description' => $product->getDescription(),
            'price' => $product->getPrice(),
            'quantity' => 1,
        ];

        return $product;
    }

    public static function remove(int $id)
    {
        if (array_key_exists($id, $_SESSION['cart'])) {
            if ($_SESSION['cart'][$id]['quantity'] === 1) {
                unset($_SESSION['cart'][$id]);
            }
            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]['quantity']--;
            }
        }
    }


    public static function getCart() : array | bool
    {
        if (isset($_SESSION['cart'])) {
            $products = [];
            foreach ($_SESSION['cart'] as $p) {
                $product = new Product();
                $product
                    ->setId($p['id'])
                    ->setName($p['name'])
                    ->setDescription($p['description'])
                    ->setPrice($p['price'])
                ;
                $product->quantity = $p['quantity'];
                $products[] = $product;
            }

            return $products;
        }

        return false;
    } 

    public static function empty()
    {
        if (isset($_SESSION['cart'])) {
            unset($_SESSION['cart']);
        }
    }
}