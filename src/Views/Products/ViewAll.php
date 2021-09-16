<?php

use eComairce\Utils\SessionManager;

?>

<h1>Catalogue</h1>


<div class="row mb-3">

    <?php foreach (array_slice($products, 0, 3) as $product): ?>

        <div class="col">
            <div class="card product-card">
                <svg xmlns="http://www.w3.org/2000/svg" class="d-block user-select-none" width="100%" height="200" aria-label="Placeholder: Image cap" focusable="false" role="img" preserveAspectRatio="xMidYMid slice" viewBox="0 0 318 180" style="font-size:1.125rem;text-anchor:middle">
                    <rect width="100%" height="100%" fill="#868e96"></rect>
                    <text x="50%" y="50%" fill="#dee2e6" dy=".3em"><?= $product->getName() ?></text>
                </svg>
                <div class="card-body">
                    <p class="card-text"><?= $product->getScroppedDescription() ?></p>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-9">
                            <a class="btn btn-card btn-info" href="/products/<?= $product->getSlug() ?>">Plus d'infos</a>
                            <?php if (SessionManager::getConnectedUser()): ?>
                                <a class="btn btn-card btn-info" href="/cart/add/<?= $product->getId() ?>">Panier</a>
                            <?php endif; ?>
                        </div>
                        <div class="col-3">
                            <span class="text-right fw-bold price-card"><?= $product->getPrice() ?> €</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach; ?>

</div>
<div class="row mb-3">

    <?php foreach (array_slice($products, 3, 3) as $product): ?>

        <div class="col">
            <div class="card product-card">
                <svg xmlns="http://www.w3.org/2000/svg" class="d-block user-select-none" width="100%" height="200" aria-label="Placeholder: Image cap" focusable="false" role="img" preserveAspectRatio="xMidYMid slice" viewBox="0 0 318 180" style="font-size:1.125rem;text-anchor:middle">
                    <rect width="100%" height="100%" fill="#868e96"></rect>
                    <text x="50%" y="50%" fill="#dee2e6" dy=".3em"><?= $product->getName() ?></text>
                </svg>
                <div class="card-body">
                    <p class="card-text"><?= $product->getScroppedDescription() ?></p>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-9">
                            <a class="btn btn-card btn-info" href="/products/<?= $product->getSlug() ?>">Plus d'infos</a>
                            <a class="btn btn-card btn-info" href="/cart/add/<?= $product->getId() ?>">Panier</a>
                        </div>
                        <div class="col-3">
                            <span class="text-right fw-bold price-card"><?= $product->getPrice() ?> €</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach; ?>

</div>