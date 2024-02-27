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
        <img src="{{ asset('images/logo.png') }}" alt="Logo" width="5%">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/product">Produits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/orders">Panier</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Inscription</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1>Vos commandes</h1>
        @if ($orders->isEmpty())
            <p>Aucune commande trouvée.</p>
        @else
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Toutes vos commandes</h5>
                            @php
                                $totalPrice = 0;
                            @endphp
                            @foreach ($orders as $order)
                                <p>Commande #{{ $order->id }} - Produit: {{ $order->product->name }} - Quantité:
                                    {{ $order->quantity }} - Prix total: {{ $order->quantity * $order->product->prix }}
                                </p>
                                @php
                                    $totalPrice += $order->quantity * $order->product->prix;
                                @endphp
                            @endforeach
                            <p class="card-text">Prix total de toutes les commandes : {{ $totalPrice }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
