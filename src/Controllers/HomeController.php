<?php

namespace eComairce\Controllers;

use eComairce\Entities\Cart;
use eComairce\Utils\SessionManager;
use eComairce\Utils\SessionCartManager;
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
        dump(SessionCartManager::getCart($this->connectedUser));
    }
}