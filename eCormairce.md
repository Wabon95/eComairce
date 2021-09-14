# eComairce

## Desription
Ce site est un site fictif de eComairce basique permettant d'acheter des produits

### Fonctionalités
- Espace utilisateur
  - Inscription
  - Connexion
  - Deconexion
  - Se souvenir de moi
  - Modification de son profil
    - Ajouter une adresse
    - Modifier une adresse
    - Supprimer une adresse
    - Modifier son mot de passe
- Consulter le listing des produits en vente
- Un produit peut être classé dans une catégorie particulière (Et une seule uniquement)
- Panier
  - Consulter les éléments présent dans le panier
  - Ajouter un produit au panier
  - Supprimer un produit du panier 
  - Modifier la quantité d'un produit présent dans le panier
  - Avoir un système de points de fidélité
- Avoir la possibilité avec un compte "Administrateur", de rajouter directement via le site un produit au catalogue
- Possibilité de donner une note sur 5 à un produit, lié à un avis

#### Base de données
- user
  - id `INT`
  - username `VARCHAR`
  - email `VARCHAR`
  - password `VARCHAR`
  - avatar `VARCHAR`
  - type `VARCHAR`
  - created_at `DATETIME`
  - updated_at `DATETIME`

- address
  - id
  - firstname `VARCHAR`
  - lastname `VARCHAR`
  - street `VARCHAR`
  - postal_code `VARCHAR`
  - city `VARCHAR`
  - supplement `VARCHAR`
  - id_user `RELATION`
  - created_at `DATETIME`
  - updated_at `DATETIME`

- product
  - id `INT`
  - name `VARCHAR`
  - description `TEXT`
  - price `FLOAT`
  - id_category `RELATION`
  - created_at `DATETIME`
  - updated_at `DATETIME`

- order
  - id `INT`
  - reference `VARCHAR`
  - id_user `RELATION`
  - created_at `DATETIME`
  - updated_at `DATETIME`
  - finished_at `DATETIME`

- order_products
  - id `INT`
  - id_order `RELATION`
  - id_product `RELATION`
  - quantity `INT`

- category
  - id `INT`
  - name  `VARCHAR`
  - created_at `DATETIME`
  - updated_at `DATETIME`

- shipping_costs
  - id `INT`
  - name `VARCHAR`
  - description `VARCHAR`
  - price `FLOAT`
  - created_at `DATETIME`
  - updated_at `DATETIME`

- promo_code
  - id `INT`
  - content `VARCHAR`
  - expire_at `DATETIME`
  - created_at `DATETIME`
  - updated_at `DATETIME`

