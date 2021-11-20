


<div class="card">
    <div class="card-body">
        <h4 class="card-title">Panier</h4>
        <?php if($cart): ?>
            <h6 class="card-subtitle mb-2 text-muted">Vous avez <?= count($cart) ?> produit(s) dans votre panier</h6>
        <?php else: ?>
            <h6 class="card-subtitle mb-2 text-muted">Votre panier est vide</h6>
        <?php endif; ?>
        <hr>


        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col" width="60%">Article</th>
                    <th scope="col" width="10%">Prix</th>
                    <th scope="col" width="20%">Quantitée</th>
                    <th scope="col" width="10%">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($cart as $p): ?>
                    <tr>
                        <td><?= $p->getName() ?></td>
                        <td><?= $p->getPrice() ?> €</td>
                        <td><span class="btn btn-cart btn-danger">-</span> <?= $p->quantity ?> <span class="btn btn-cart btn-success">+</span></td>
                        <td><?= $p->getPrice() * $p->quantity ?> €</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>