<?php

namespace eComairce\Entities;

use Cocur\Slugify\Slugify;
use eComairce\Utils\FlashMessage;

class Product
{
    private int $id;
    private string $name;
    private string $slug;
    private string $description;
    private float $price;
    
    public function setId(int $id) : self
    {
        $this->id = $id;
        return $this;
    }
    
    public function setName(string $name) : self
    {
        $this->name = strip_tags($name);
        $this->slug = (new Slugify())->slugify($name);
        return $this;
    }

    public function setDescription(string $description) : self
    {
        $this->description = strip_tags($description);
        return $this;
    }

    public function setPrice(float $price) : self
    {
        $this->price = $price;
        return $this;
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function getSlug() : string
    {
        return $this->slug;
    }

    public function getDescription() : string
    {
        return $this->description;
    }

    public function getScroppedDescription() : string
    {
        if (strlen($this->description) > 200) {
            return trim(substr($this->description, 0, 300)) . '...';
        }
        return $this->description;
    }

    public function getPrice() : float
    {
        return $this->price;
    }


    public function validator() : bool
    {
        $error = false;

        return !$error;
    }

}