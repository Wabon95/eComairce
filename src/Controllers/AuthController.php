<?php

namespace eComairce\Controllers;

use eComairce\Entities\User;
use eComairce\Utils\SessionManager;
use eComairce\Controllers\CoreController;
use eComairce\Repositories\UserRepository;

class AuthController extends CoreController
{
    public function register_view()
    {
        $this->render('Register', [
            'page_title' => 'eCormairce - Inscription'
        ]);
    }

    public function register_treatment()
    {
        $user = new User();
        $user
            ->setEmail($_POST['inputEmail'])
            ->setPassword($_POST['inputPassword'])
        ;
        
        if (UserRepository::insert($user)) {
            $this->redirect('/login');
        } else {
            $this->redirect('/register');
        }
    }

    public function login_view()
    {
        $this->render('Login', [
            'page_title' => 'eCormairce - Connexion'
        ]);
    }

    public function login_treatment()
    {
        if (SessionManager::connectUser($_POST['inputEmail'], $_POST['inputPassword'])) {
            $this->redirect('/');
        } else {
            $this->redirect('/login');
        }
    }

    public function profile_view()
    {
        // TO DO
    }
    
    public function profile_treatment()
    {
        // TO DO
    }


    public function logout()
    {
        SessionManager::disconnectUser();
        $this->redirect('/');
    }
}