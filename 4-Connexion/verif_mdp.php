<?php
// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification si l'e-mail a été fourni
    if (isset($_POST['mail']) && !empty($_POST['mail'])) {
        // Connexion à la base de données
        $sqlHost = 'localhost';
        $sqlUser = 'root';
        $sqlPass = 'root';
        $dbname = 'commerce'; /* nom de la base de donné dans Php_my_admin*/
        
        ini_set("SMTP", "localhost");
        ini_set("smtp_port", "25");

        $link = mysqli_connect($sqlHost, $sqlUser, $sqlPass, $dbname);

        if (mysqli_connect_errno()) {
            printf("Echec de la connexion : %s\n", mysqli_connect_error());
            exit();
        }
        $mail=$_POST['mail'];
        // Génération d'un mot de passe aléatoire
        $nouveau_mot_de_passe = uniqid(); // Génère une chaîne hexadécimale de 16 caractères aléatoires
        echo $nouveau_mot_de_passe.$mail;
        var_dump($nouveau_mot_de_passe);
        var_dump($mail);

        // Hash du nouveau mot de passe
        //$hashed_password = password_hash($nouveau_mot_de_passe, PASSWORD_DEFAULT);

        $query = "UPDATE compte_client SET Mdp=? WHERE Email=?";
        $stmt = $link->prepare($query);
        $stmt->bind_param("ss", $nouveau_mot_de_passe, $mail);
        $stmt->execute();
        // Mise à jour du mot de passe dans la base de données

        if ($stmt) {
            // Envoi de l'e-mail avec le nouveau mot de passe
            $to = $_POST['mail'];
            $subject = 'Réinitialisation de votre mot de passe';
            $message = 'Votre nouveau mot de passe est : ' . $nouveau_mot_de_passe;
            $headers = 'From: codehex.du.turfu@gmail.com' . "\r\n" .
                'Reply-To: codehex.du.turfu@gmail.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            // Envoi de l'e-mail
            mail($to, $subject, $message, $headers);

            echo "Un nouveau mot de passe a été envoyé à votre adresse e-mail.";
        } else {
            echo "Erreur lors de la mise à jour du mot de passe : " . $link->error;
        }

        // Fermeture de la connexion
        $link->close();
    } else {
        echo "Veuillez fournir une adresse e-mail.";
    }
}
?>
