<?php

namespace eComairce\Controllers;

use eComairce\Entities\Product;
use eComairce\Controllers\ProductController;
use eComairce\Repositories\ProductRepository;

class ProductController extends CoreController
{
    public function view_all()
    {
        $products = ProductRepository::findAll();
        shuffle($products);
        $this->render('Products/ViewAll', [
            'page_title' => 'eCormairce - Catalogue',
            'products' => $products
        ]);
    }

    public function view_one($slug)
    {
        $product = ProductRepository::findBySlug($slug);
        $this->render('Products/ViewOne', [
            'page_title' => 'eCormairce - ' . $product->getName(),
            'product' => $product
        ]);
    }

    public function add_view()
    {
        $this->render('Products/Add', ['page_title' => 'eCormairce - Ajouter un produit']);
    }

    public function add_treatment()
    {
        $product = new Product();
        $product
            ->setName($_POST['inputName'])
            ->setDescription($_POST['textareaDescription'])
            ->setPrice($_POST['inputPrice'])
        ;
        if (ProductRepository::insert($product)) {
            $this->redirect('/');
        } else {
            $this->redirect('/products/add', 'POST');
        }
    }
}