<?php

namespace eComairce\Controllers;

use eComairce\Entities\Cart;
use eComairce\Utils\SessionManager;
use eComairce\Controllers\CoreController;
use eComairce\Repositories\CartRepository;
use eComairce\Repositories\ProductRepository;

class HomeController extends CoreController
{
    public function homepage()
    {
        $this->render('Homepage', ['page_title' => 'eCormairce - Accueil']);
    }

    public function test()
    {
        $cart = new Cart();
        $cart
            ->setUserId(SessionManager::getConnectedUser()->getId())
            ->addProduct(ProductRepository::find(5))
            ->addProduct(ProductRepository::find(6))
            ->addProduct(ProductRepository::find(7))
            // ->removeProduct(ProductRepository::find(7))
        ;

        CartRepository::insert($cart);
    }
}