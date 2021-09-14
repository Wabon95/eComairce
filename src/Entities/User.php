<?php

namespace eComairce\Entities;

use eComairce\Utils\FlashMessage;

class User
{
    private int $id;
    private string $email;
    private string $password;
    private int $type = 0;
    private ?string $avatar;

    public function setId(int $id) : self
    {
        $this->id = $id;
        return $this;
    }

    public function setEmail(string $email) : self
    {
        $this->email = strip_tags($email);
        return $this;
    }

    public function setPassword(string $password) : self
    {
        $this->password = strip_tags($password);
        return $this;
    }

    public function setType(int $type) : self
    {
        $this->type = $type;
        return $this;
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function getEmail() : string
    {
        return $this->email;
    }

    public function getPassword() : string
    {
        return $this->password;
    }
    
    public function getType() : int
    {
        return $this->type;
    }

    public function getNickname() : string
    {
        return explode('@', $this->email)[0];
    }
    
    public function validator() : bool
    {
        $error = false;

        if (!filter_var(trim($this->email), FILTER_VALIDATE_EMAIL)) {
            FlashMessage::add('warning', "Votre adresse email n'est pas conforme.");
            $error = true;
        }
        
        if (strlen(trim($this->password)) < 8) {
            FlashMessage::add('warning', "Votre mot de passe doit contenir 8 caractères minimum.");
            $error = true;
        }

        return !$error;
    }

}