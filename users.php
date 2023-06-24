<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FF GAMES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php include('include/header.php') ?>

    <main>
        <section>
            <div class="container-fluid">
                <div class="row pt-5">
                    <div class="col-12 col-lg-9">
                        <div class="row d-flex justify-content-center pt-5">
                            <div class="d-flex pb-4">
                                <div class="col-3" style="color: white">
                                    <h2>Liste des utilisateurs</h2>
                                </div>
                                <div class="col-9 col-lg-9 d-flex justify-content-end align-items-center">
                                    <div class="input-group searchBarDashboard">
                                        <input type="text" class="form-control" id="autoSizingInputGroup"
                                            placeholder="Username">
                                        <div class="input-group-text"><a href=""><i class="bi bi-search"></i></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="pb-5 overflow-y-scroll">
                                <div class="table-responsive">
                                    <table class="table table-striped" style="color: white">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Pseudo</th>
                                                <th scope="col">Age</th>
                                                <th scope="col">Adresse mail</th>
                                                <th scope="col">Voir</th>
                                                <th scope="col">Supprimer</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Connexion à la base de données
                                            try {
                                                $bdd = new PDO('mysql:host=localhost;dbname=pa', 'root', 'root');
                                            } catch (Exception $e) {
                                                die('Erreur: ' . $e->getMessage());
                                            }

                                            // Récupérer les utilisateurs de la base de données
                                            $query = "SELECT * FROM users";
                                            $stmt = $bdd->query($query);


                                            // Afficher les utilisateurs
                                            while ($users = $stmt->fetch()) {
                                                ?>
                                                <tr style="color: white">
                                                    <th scope="row">
                                                        <?= $users['id']; ?>
                                                    </th>
                                                    <td>
                                                        <?= $users['pseudo']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $users['age']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $users['email']; ?>
                                                    </td>
                                                    <td><a href=""><i
                                                                class="bi bi-eye iconDashboard text-success fs-4"></i></a>
                                                    </td>
                                                    <td><a href=""><i
                                                                class="bi bi-trash3 iconDashboard text-danger fs-4"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include('include/footer.php') ?>

</body>