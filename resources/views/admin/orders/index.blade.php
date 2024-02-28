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

    <div class="container">
        <h1>Toutes les commandes</h1>
        @foreach ($orders->groupBy('user_id') as $userId => $userOrders)
            <div class="card mb-4">
                <div class="card-header">
                    Commandes de l'utilisateur {{ $userOrders->first()->user->name }}
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($userOrders as $order)
                            <li class="list-group-item">
                                <strong>ID de la commande:</strong> {{ $order->id }} <br>
                                Produit: {{ $order->product->name }} <br>
                                Quantité: {{ $order->quantity }} <br>
                                Prix unitaire: {{ $order->product->prix }} € <br>
                                Prix total de cet article: {{ $order->product->prix * $order->quantity }} € <br>

                                <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer la commande</button>
                                </form>

                            </li>
                        @endforeach
                        <li class="list-group-item">
                            <strong>Prix total de la commande:</strong>
                            {{ $userOrders->sum(function ($order) {
                                return $order->product->prix * $order->quantity;
                            }) }}
                            €
                        </li>
                    </ul>
                </div>
            </div>
        @endforeach
    </div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
