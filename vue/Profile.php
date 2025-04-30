<?php
session_start();

if (!isset($_SESSION['id_utilisateur'])) {
    header("Location: Connexion.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Utilisateur</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            padding: 30px;
            box-sizing: border-box;
        }
        h1 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }
        label {
            font-size: 16px;
            color: #555;
            margin-bottom: 5px;
            display: block;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 8px 0 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .role-info {
            font-size: 14px;
            color: #888;
            margin: 10px 0;
        }
        .form-footer {
            text-align: center;
            margin-top: 20px;
        }
        .form-footer a {
            color: #007bff;
            text-decoration: none;
        }
        .form-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Profil</h1>

    <form action="../src/traitement/UpdateProfilTrt.php" method="POST">
        <label for="nom_uti">Nom :</label>
        <input type="text" id="nom_uti" name="nom_uti" value="<?php echo htmlspecialchars($_SESSION['nom_uti']); ?>" required>

        <label for="prenom_uti">Prénom :</label>
        <input type="text" id="prenom_uti" name="prenom_uti" value="<?php echo htmlspecialchars($_SESSION['prenom_uti']); ?>" required>

        <label for="email">Email :</label>
        <input type="email" id="mail_uti" name="mail_uti" value="<?php echo htmlspecialchars($_SESSION['mail_uti']); ?>" required>

        <label for="mdp">Nouveau mot de passe :</label>
        <input type="password" id="mdp" name="mdp" placeholder="Entrez un nouveau mot de passe (laisser vide si inchangé)">

        <div class="role-info">
            <strong>ID :</strong> <?php echo $_SESSION['id_utilisateur']; ?><br>
            <strong>Rôle :</strong> <?php echo htmlspecialchars($_SESSION['role']); ?>
        </div>

        <input type="submit" name="ok" value="Mettre à jour">
    </form>

    <div class="form-footer">
        <a href="../src/traitement/DeconnexionUtilisateurTrt.php">Déconnexion</a>
    </div>
    <a href="../Index.php">Retour à l'acceuil</a>
</div>

</body>
</html>
