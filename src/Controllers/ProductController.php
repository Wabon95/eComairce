<?php

namespace eComairce\Controllers;

use eComairce\Entities\Product;
use eComairce\Controllers\ProductController;
use eComairce\Repositories\ProductRepository;

class ProductController extends CoreController
{
    public function view_all()
    {
        $this->render('Products/ViewAll', [
            'page_title' => 'eCormairce - Catalogue',
            'products' => ProductRepository::findAll()
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
        if ($product->validator()) {
            ProductRepository::insert($product);
            $this->redirect('/');
        } else {
            $this->redirect('/products/add', 'POST');
        }
    }
}