<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
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
                    <a class="nav-link" href="/usersaccueil">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/usersaccueil">Produits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/ordersutilisateur">Panier</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contactuser">Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <a class="nav-link" href="/profil">
                    Profil
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link btn btn-danger text-white">Déconnexion</button>
                </form>
            </ul>
        </div>
    </nav>




    <div class="container">
        <div class="position-relative">
            <h1>Contact</h1>
        </div>
        <div class="contact-form">
            @csrf
            <div class="form-group">
                <label for="name">Nom:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>
            </div>
            <button type="submit">Envoyer</button>
        </div>
    </div>



    <style>
        /* Styles pour le formulaire de contact */
        .contact-form {
            margin-top: 20px;
        }

        .contact-form .form-group {
            margin-bottom: 20px;
        }

        .contact-form label {
            display: block;
            margin-bottom: 5px;
        }

        .contact-form input[type="text"],
        .contact-form input[type="email"],
        .contact-form textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .contact-form textarea {
            height: 150px;
        }

        .contact-form button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .contact-form button:hover {
            background-color: #0056b3;
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
