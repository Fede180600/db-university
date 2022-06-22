<?php 
require_once __DIR__ . "/database.php";
require_once __DIR__ . "/Department.php";

$id = $_GET["id"];
$sql = "SELECT * FROM `departments` WHERE `id`=$id";
$result = $conn->query($sql);

$departments = [];

//controllo sulla risposta della query
if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $current_department = New Department($row["id"], $row["name"]);
        $current_department->showInfo($row["address"], $row["phone"], $row["email"], $row["website"], $row["website"]);
        $current_department->head_of_department= $row["head_of_department"];
        $departments[] = $current_department;
    }
} elseif($result) {
    echo "Dipartimento non trovato";
} else {
    echo "Errore nella query";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php foreach($departments as $department) {?>

        <h1><?php echo $department->name?></h1>
        <p><?php echo $department->head_of_department?></p>

        <h2>Contatti:</h2>
        <ul>
            <?php foreach($department->printContacts() as $key => $value) {?>
            <li><?php echo "$key: $value" ?></li>
            <?php } ?>
        </ul>
    <?php } ?>

    <a href="index.php">Torna alla home</a>

</body>
</html>