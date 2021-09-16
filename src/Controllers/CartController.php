<?php

namespace eComairce\Controllers;

use eComairce\Utils\CartManager;
use eComairce\Controllers\CoreController;
use eComairce\Repositories\ProductRepository;

class CartController extends CoreController
{
    public function view()
    {
        dump(CartManager::getCart());
    }

    public function add($productId)
    {
        CartManager::add(ProductRepository::find($productId));
        $this->redirect('/cart');
    }
}