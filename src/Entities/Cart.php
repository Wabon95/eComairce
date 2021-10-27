<?php

namespace eComairce\Entities;

use eComairce\Entities\Product;
use eComairce\Utils\FlashMessage;
use eComairce\Utils\SessionManager;
use eComairce\Repositories\CartRepository;

abstract class Cart
{

    public static function init()
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [
                'user' => serialize(SessionManager::getConnectedUser()),
                'products' => []
            ];
        }
    }

    public static function getCart()
    {
        self::init();
        return $_SESSION['cart'];
    }

    public static function getUser() : User
    {
        self::init();
        return unserialize($_SESSION['cart']['user']);
    }

    public static function addProduct(Product $product, int $quantity = 0)
    {
        self::init();

        // Si quantity est supérieur à 0, c'est forcément qu'on veut créer un panier depuis un panier récupéré via la base de données
        if ($quantity > 0) {
            $product->quantity = $quantity;
            $_SESSION['cart']['products'][$product->getId()] = serialize($product);
            CartRepository::push(SessionManager::getConnectedUser(), self::getProducts());
        } else {
            if (isset($_SESSION['cart']['products'][$product->getId()])) {
                $productFromCart = unserialize($_SESSION['cart']['products'][$product->getId()]);
                $productFromCart->quantity++;
                $_SESSION['cart']['products'][$product->getId()] = serialize($productFromCart);
            } else {
                $product->quantity = 1;
                $_SESSION['cart']['products'][$product->getId()] = serialize($product);
            }
            FlashMessage::add('success', "Le produit a correctement été ajouté au panier.");
            CartRepository::push(SessionManager::getConnectedUser(), self::getProducts());
        }
    }
    
    public static function removeProduct(Product $product)
    {
        self::init();

        if (isset($_SESSION['cart']['products'][$product->getId()])) {
            $productFromCart = unserialize($_SESSION['cart']['products'][$product->getId()]);

            if ($productFromCart->quantity > 1) {
                $productFromCart->quantity--;
                $_SESSION['cart']['products'][$product->getId()] = serialize($productFromCart);
                CartRepository::push(SessionManager::getConnectedUser(), self::getProducts());
            } elseif ($productFromCart->quantity === 1) {
                unset($_SESSION['cart']['products'][$product->getId()]);
                CartRepository::push(SessionManager::getConnectedUser(), self::getProducts());
            }
        }
        FlashMessage::add('success', "Le produit a correctement été supprimé du panier.");
    }

    public static function getProduct(int $productId) : Bool | Product
    {
        if (isset($_SESSION['cart']['products'][$productId])) {
            return unserialize($_SESSION['cart']['products'][$productId]);
        } else {
            return false;
        }
    }

    public static function getProducts() : Bool | Array
    {
        if (isset($_SESSION['cart'])) {
            $products = [];
            foreach ($_SESSION['cart']['products'] as $p) {
                $products[] = unserialize($p);
            }
            return $products;
        } else {
            return false;
        }
    }

    public static function persist() : Array
    {
        $cartToReturn = [
            'user' => unserialize($_SESSION['cart']['user'])->getId(),
            'products' => []
        ];

        foreach($_SESSION['cart']['products'] as $p) {
            $cartToReturn['products'][] = unserialize($p);
        }

        return $cartToReturn;
    }
}