<?php
// Database connection parameters - MAMP
$dsn = 'mysql:host=127.0.0.1;port=8889;dbname=Psychologie_site';
$username = 'root';
$password = 'root';

try{
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Récupérer les données du formulaire de contact
    $firstNameForm = $_POST['firstName'];
    $lastNameForm = $_POST['lastName'];
    $emailForm = $_POST['email'];
    $messageForm = $_POST['message'];

    //Vérifier l’unicité de l’adresse mail
    $query = "SELECT * FROM contact_forms WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $emailForm);
    $stmt->execute();

    //Insérer les données dans la base 
    $insertQuery = "INSERT INTO contact_forms (id, firstName, lastName, email, message) VALUES (NULL, :firstName, :lastName, :email, :message)";
    $stmt = $pdo->prepare($insertQuery);
    
    $stmt->bindParam(':firstName', $firstNameForm);
    $stmt->bindParam(':lastName', $lastNameForm);
    $stmt->bindParam(':email', $emailForm);
    $stmt->bindParam(':message', $messageForm);
    $stmt->execute();
    //Redirection vers la page d’accueil après l’envoi du formulaire
    header("Location: /");
    exit;

}
catch (PDOException $e){
    echo "Erreur lors de l’inscription : ". $e->getMessage();
}

?>