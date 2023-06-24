<?php
// Validation des champs
if (!isset($_POST['email']) || empty($_POST['email']) || !isset($_POST['pseudo']) || empty($_POST['pseudo']) || !isset($_POST['password']) || empty($_POST['password']) || !isset($_POST['age']) || empty($_POST['age'])) {
  header('location: inscription.php?message=Veuillez remplir tous les champs');
  exit;
}

// Validation de l'email
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  header('location: inscription.php?message=Email invalide');
  exit;
}

// Validation du mot de passe
$password = $_POST['password'];
if (strlen($password) < 6 || strlen($password) > 12 || !preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()\-_=+{};:,<.>]).{6,12}$/", $password)) {
  header('location: inscription.php?message=Le mot de passe doit contenir entre 6 et 12 caractères et inclure au moins une lettre minuscule, une lettre majuscule, un chiffre et un caractère spécial');
  exit;
}

// Connexion à la base de données
try {
  $bdd = new PDO('mysql:host=localhost;dbname=pa', 'root', 'root');
} catch (Exception $e) {
  die('Erreur: ' . $e->getMessage());
}

// Vérification si l'email est déjà utilisé
$q = 'SELECT id FROM users WHERE email = ?';
$req = $bdd->prepare($q);
$req->execute([$_POST['email']]);
$results = $req->fetchAll();

if (!empty($results)) {
  header('location: inscription.php?message=Email déjà utilisé');
  exit;
}

// Insertion des données dans la base de données
$q = 'INSERT INTO users (email, password, pseudo, age) VALUES(:email, :password, :pseudo, :age)';
$req = $bdd->prepare($q);
$result = $req->execute([
  'email' => $_POST['email'],
  'password' => hash('sha256', $_POST['password']),
  'pseudo' => $_POST['pseudo'],
  'age' => $_POST['age']
]);

if (!$result) {
  header('location: inscription.php?message=Erreur lors de l\'inscription');
  exit;
}

header('location: connexion.php?message=Inscription réussie ! Connectez-vous.');
?>
