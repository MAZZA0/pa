<?php
session_start();

var_dump($_POST);
var_dump(hash('sha256', $_POST['password']));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier si les champs email et password sont définis et non vides
    if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])) {
        // Vérifier le format de l'email
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            // Connexion à la base de données
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=pa', 'root', 'root');
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }

            // Vérification de l'existence du compte
            $q = 'SELECT id, email, password FROM users WHERE email = :email';
            $req = $bdd->prepare($q);
            $req->execute([
                'email' => $_POST['email'],
            ]);

            $results = $req->fetch();
            var_dump($results);
        

            if ($results) {

                if($results['password'] == hash('sha256', $_POST['password'])){
                    // Connexion réussie
                    $_SESSION['email'] = $_POST['email'];
                    $_SESSION['id'] = $results['id'];   
                    header('Location: index.php?message=ConnexionRéussie');
                    exit;
                }
                
            } else {
                // Identifiants incorrects
                $message = 'Email ou mot de passe incorrect.';
                //header('Location: connexion.php?message=' . urlencode($message));
                die();
            }
        } else {
            // Email invalide
            $message = 'Format d\'email invalide.';
            header('Location: connexion.php?message=' . urlencode($message));
            exit;
        }
    } else {
        // Champs non remplis
        $message = 'Veuillez remplir tous les champs.';
        header('Location: connexion.php?message=' . urlencode($message));
        exit;
    }
} else {
    // Rediriger vers la page de connexion si le formulaire n'a pas été soumis
    header('Location: connexion.php');
    exit;
}
?>