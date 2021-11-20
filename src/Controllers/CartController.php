<?php

namespace eComairce\Controllers;

use eComairce\Entities\Cart;
use eComairce\Utils\SessionCartManager;
use eComairce\Controllers\CoreController;
use eComairce\Repositories\CartRepository;
use eComairce\Repositories\ProductRepository;

class CartController extends CoreController
{
    public function view()
    {
        // dump(CartRepository::pull());
        $this->render('Cart', [
            'page_title' => 'eCormairce - Panier',
            'cart' => CartRepository::pull()
        ]);
    }

    public function add($productId)
    {
        if ($product = ProductRepository::find($productId)) {
            Cart::addProduct($product);
            $this->redirect('/cart');
        } else {
            $this->redirect('/');
        }
    }
}