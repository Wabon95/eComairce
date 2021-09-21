<?php

namespace eComairce\Utils;

use eComairce\Entities\User;
use eComairce\Entities\Product;
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

    public static function initCart()
    {
        if (!isset($_SESSION['cart'])) {
            return $_SESSION['cart'] = [];
        }
        return $_SESSION['cart'];
    }

    public static function getCart(bool $objects = false) : array
    {
        self::initCart();

        if ($objects) {
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

                return $products;
            }
        }
        return $_SESSION['cart'];
    }

    public static function addToCart(Product $product)
    {
        self::initCart();

        if (array_key_exists($product->getId(), $_SESSION['cart'])) {
            $_SESSION['cart'][$product->getId()]['quantity']++;

            return $product;
        }
        return $_SESSION['cart'][$product->getId()] = [
            'id' => $product->getId(),
            'name' => $product->getName(),
            'slug' => $product->getSlug(),
            'description' => $product->getDescription(),
            'price' => $product->getPrice(),
            'quantity' => 1
        ];
    }

    public static function removeFromCart(Product $product)
    {
        self::initCart();

        if (array_key_exists($product->getId(), $_SESSION['cart'])) {
            if ($_SESSION['cart'][$product->getId()]['quantity'] === 1) {
                unset($_SESSION['cart'][$product->getId()]);
            }
            if (isset($_SESSION['cart'][$product->getId()])) {
                $_SESSION['cart'][$product->getId()]['quantity']--;
            }
        }
    }

}