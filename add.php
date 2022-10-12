<?php
require_once 'index.php';


function createConnection(): PDO
{
    return new PDO("mysql:host=" . SERVER . ";dbname=" . DSN . ";charset=utf8", USER, PASSWORD);
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $errors = [];

    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);

    if (empty($firstname)) {
        $errors[] = 'Veuillez entrer votre prénom';
    }

    if (empty($lastname)) {
        $errors[] = 'Veuillez entrer votre nom';
    }

    $maxFirstnameLength = 45;
    if (strlen($firstname) > $maxFirstnameLength) {
        $errors[] = 'le prénom doit faire moins de' . $maxFirstnameLength . ' caractères.';
    }

    $maxLastnameLength = 45;
    if (strlen($lastname) > $maxLastnameLength) {
        $errors[] = 'Le nom doit faire moins de' . $maxLastnameLength . ' caractères.';
    }

    if (empty($errors)) {
        $connection = createConnection();
        $query = 'INSERT INTO friend(firstname, lastname) VALUES (:firstname, :lastname)';
        $statement = createConnection()->prepare($query);
        $statement->bindValue(':firstname', $firstname, \PDO::PARAM_STR);
        $statement->bindValue(':lastname', $lastname, \PDO::PARAM_STR);
        $statement->execute();

        header('location:index.php');
    }
}
