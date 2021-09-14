<?php

namespace eComairce\Controllers;

use eComairce\Utils\Database;
use eComairce\Controllers\CoreController;

class HomeController extends CoreController
{
    public function homepage()
    {
        $this->render('Homepage', ['page_title' => 'eCormairce - Accueil']);
    }
}