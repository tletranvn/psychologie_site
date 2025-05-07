<?php
// Database connection parameters - MAMP
$dsn = 'mysql:host=127.0.0.1;port=8889;dbname=Psychologie_site';
$username = 'root';
$password = 'root';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare and execute the SQL statement to fetch all users
    $query = "SELECT * FROM users";
    $stmt = $pdo->prepare($query);
    $stmt->execute(); // ← Execute the statement

    // Fetch all the users
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Print the users
    
    foreach ($users as $user){
        echo "ID: " . $user['idUser'] . "<br>";
        echo "Nom: " . $user['lastName'] . "<br>";
        echo "Prénom: " . $user['firstName'] . "<br>";
        echo "Email: " . $user['email'] . "<br>";
        echo "Mot de passe: " . $user['password'] . "<br>";
        echo "<br>";
    }
}
// Catch any connection errors
catch (PDOException $e) {
    echo "Erreur de connexion " . $e->getMessage();
}
