<?php dump($cart) ?>


<div class="card">
  <div class="card-body">
    <h4 class="card-title">Panier</h4>
    <?php if(!empty($cart->getProducts())): ?>
        <h6 class="card-subtitle mb-2 text-muted">Vous avez <?= count($cart->getProducts()) ?> produit(s) dans votre panier</h6>
    <?php else: ?>
        <h6 class="card-subtitle mb-2 text-muted">Votre panier est vide</h6>
    <?php endif; ?>
    <hr>

    <?php foreach($cart->getProducts() as $p): ?>
        <div class="d-flex bd-highlight mb-3">
            <div class="me-auto p-2 bd-highlight"><?= $p->getName() ?></div>
            <div class="p-2 bd-highlight"><?= $p->getPrice() ?> €</div>
        </div>
        <hr>
    <?php endforeach; ?>
  </div>
</div>