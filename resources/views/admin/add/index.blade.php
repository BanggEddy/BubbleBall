<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" width="2%">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/adminaccueil">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/adminaccueil">Produits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/ordersadmin">Panier</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.products.create') }}">Ajout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.products.delete') }}">Suppression</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/profiladmin">Profil</a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger text-white">Déconnexion</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>


    <div class="container">
        <h1>Ajouter un nouveau produit</h1>
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nom du produit :</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="type">Type :</label>
                <input type="text" class="form-control" id="type" name="type" required>
            </div>
            <div class="form-group">
                <label for="prix">Prix :</label>
                <input type="number" class="form-control" id="prix" name="prix" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantité :</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required>
            </div>
            <div class="form-group">
                <label for="image">Image :</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
