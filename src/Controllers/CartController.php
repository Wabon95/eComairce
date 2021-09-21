<?php

namespace eComairce\Controllers;

use eComairce\Utils\SessionManager;
use eComairce\Controllers\CoreController;
use eComairce\Repositories\ProductRepository;

class CartController extends CoreController
{
    public function view()
    {
        dump(SessionManager::getCart());
    }

    public function add($productId)
    {
        if ($product = ProductRepository::find($productId)) {
            SessionManager::addToCart($product);
            $this->redirect('/cart');
            die;
        }
        $this->redirect('/');
    }
}