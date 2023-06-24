<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FF GAMES</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php include('include/header.php'); ?>

    <?php
    // Vérifier si le paramètre 'message' est présent dans l'URL
    if (isset($_GET['message']) && !empty($_GET['message'])) {
        echo '<p>' . htmlspecialchars($_GET['message']) . '</p>';
    }
    ?>

    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="verification.php" method="post">
                            <h3 class="text-center custom">Rejoins vite tes amis !</h3>
                            <br>
                            <div class="form-group">
                                <label for="email" class="custom">Email</label><br>
                                <input type="text" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="custom">Mot de passe</label><br>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="custom">
                                    <span>Se souvenir de moi</span>
                                    <span><input id="remember-me" name="remember-me" type="checkbox"></span>
                                </label>
                                <a href="#" class="link">Mot de passe oublié ?</a>
                                <br>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit" style="background-color: #7161EF;">Se connecter</button>
                                    <p class="compte">
                                        Vous n'avez pas de compte ?
                                        <a href="inscription.php" class="link">Créer un compte</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('include/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>

</html>
