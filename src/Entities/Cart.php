<?php

namespace eComairce\Entities;

use eComairce\Entities\Product;

class Cart
{
    private int $user_id;
    private array $products = [];
    
    public function setUserId(int $id) : self
    {
        $this->user_id = $id;
        return $this;
    }

    public function addProduct(Product $product) : self
    {
        if (array_key_exists($product->getId(), $this->products)) {
            $this->products[$product->getId()]->quantity++;

            return $this;
        }
        $this->products[$product->getId()] = $product;
        $this->products[$product->getId()]->quantity = 1;

        return $this;
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function getUser()
    {
        return $this->user_id;
    }

}