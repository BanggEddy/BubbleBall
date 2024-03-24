# BubbleBall

BubbleBall est un projet Laravel qui fournit une plateforme pour gérer des produits, des commandes et des interactions utilisateur. Il inclut diverses fonctionnalités pour répondre aux besoins des utilisateurs et des administrateurs.

## Fonctionnalités Principales

### Authentification

- **Inscription Utilisateur:** Les utilisateurs peuvent s'inscrire sur la plateforme en fournissant des informations telles que leur nom, leur adresse e-mail et leur mot de passe. Le mot de passe respecte les conditions du CNIL.
- **Connexion Utilisateur:** Les utilisateurs peuvent se connecter à leur compte en utilisant leur adresse e-mail et leur mot de passe. Le mot de passe est hashé dans la base de données pour des raisons de sécurité.
- **Rôles Utilisateur:** Les utilisateurs sont affectés à des rôles pour déterminer leurs autorisations dans le système. Les rôles incluent 'USER' pour les utilisateurs normaux et 'ADMIN' pour les administrateurs.

### Gestion des Produits

- **Ajout de Produits:** Les administrateurs peuvent ajouter de nouveaux produits à la plateforme en fournissant des informations telles que le nom, le type, le prix, la quantité et l'image.
- **Modification de Quantité:** Les administrateurs peuvent ajouter ou retirer des quantités de produits existants.
- **Suppression de Produits:** Les administrateurs peuvent supprimer des produits de la plateforme s'ils ne sont plus nécessaires.

### Panier Utilisateur

- **Ajout au Panier:** Les utilisateurs peuvent ajouter des produits à leur panier en spécifiant la quantité souhaitée.
- **Affichage du Panier:** Les utilisateurs peuvent voir les produits actuellement présents dans leur panier, ainsi que le prix total des produits.
- **Suppression du Panier:** Les utilisateurs peuvent supprimer des produits de leur panier s'ils ne souhaitent plus les acheter.

### Profil Utilisateur

- **Affichage du Profil:** Les utilisateurs peuvent voir leur profil utilisateur, y compris des informations telles que leur nom, leur adresse e-mail et leur historique de commandes.

### Gestion des Commandes Administrateur

- **Visualisation des Commandes:** Les administrateurs peuvent voir toutes les commandes passées par les utilisateurs sur la plateforme, ainsi que les détails de chaque commande.
- **Suppression de Commandes:** Les administrateurs peuvent supprimer des commandes entières ou des produits spécifiques de chaque commande.

### Traçabilité des Actions Administratives

- **Historique des Actions:** Chaque action effectuée par un administrateur est enregistrée dans la table HistoryAdmin, fournissant une traçabilité complète des modifications apportées au système.

## Démarrage

Pour configurer et exécuter le projet BubbleBall localement, suivez les instructions suivantes :

1. Clonez le dépôt du projet sur votre machine locale.
2. Installez les dépendances Composer en exécutant `composer install` dans le répertoire racine du projet.
3. Configurez le fichier `.env` avec vos informations d'accès à la base de données et autres paramètres de configuration.
4. Exécutez les migrations et les seeders de la base de données en utilisant les commandes `php artisan migrate` et `php artisan db:seed`.
5. Lancez l'application en utilisant `php artisan serve` et accédez-y dans votre navigateur web.

## Contribution

Les contributions au projet BubbleBall sont les bienvenues ! Si vous trouvez des problèmes ou avez des suggestions d'amélioration, veuillez ouvrir une issue ou soumettre une pull request sur le dépôt GitHub du projet.

## Licence

Le projet BubbleBall est un logiciel open-source sous licence MIT License. Vous êtes libre d'utiliser, de modifier et de distribuer le code pour des projets personnels et commerciaux.
