<h1>Ajouter un produit</h1>

<form action="/products/add" method="post">

    <div class="form-group">
        <label class="col-form-label mt-4" for="inputName">Nom</label>
        <input type="text" class="form-control" name="inputName" id="inputName">
    </div>

    <div class="form-group">
        <label for="textareaDescription" class="form-label mt-4">Description</label>
        <textarea class="form-control" name="textareaDescription" id="textareaDescription" rows="3"></textarea>
    </div>

    <div class="form-group mb-3">
        <label for="inputPrice" class="form-label mt-4">Prix</label>
        <input type="number" class="form-control" name="inputPrice" id="inputPrice">
    </div>

    <button type="submit" class="btn btn-success">Ajouter</button>
</form>