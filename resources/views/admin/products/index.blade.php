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
                    <a class="nav-link" href="{{ route('admin.orders.index') }}">Commandes</a>
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


    @section('content')
        <div class="container">
            <h1>Tous les Produits</h1>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img src="{{ asset('images/' . $product->image) }}" class="card-img-top" alt="Images">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->type }}</p>
                                <p class="card-text">Prix: {{ $product->prix }}</p>
                                <p class="card-text">Quantité disponible: {{ $product->quantity }}</p>

                                <form action="{{ route('admin.products.addQuantity', $product->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="input-group">
                                        <input type="number" name="quantity" class="form-control"
                                            placeholder="Quantité à ajouter" min="1" required>
                                        <button type="submit" class="btn btn-primary">Ajouter</button>
                                    </div>
                                </form>

                                <form action="{{ route('admin.products.removeQuantity', $product->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="input-group">
                                        <input type="number" name="quantity" class="form-control"
                                            placeholder="Quantité à retirer" min="1" required>
                                        <button type="submit" class="btn btn-danger">Retirer</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

    </html>
