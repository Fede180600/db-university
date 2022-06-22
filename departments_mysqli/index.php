<?php 
require_once __DIR__ . "/database.php";
require_once __DIR__ . "/Department.php";


// query per database
$sql = "SELECT `id`, `name` FROM `departments`";
$result = $conn->query($sql);

$departments = [];

// controllo la risposta della query
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $current_department = new Department($row["id"], $row["name"]);
        $departments[] = $current_department;
    }

    // var_dump($departments);
} elseif ($result) {

} else {
    echo "Errone nella query";
    die();
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
    
    <h1>Dipartimenti:</h1>

    <?php foreach($departments as $department) {?>

        <section>
            <h2><?php echo $department->name; ?></h2>
            <a href="single_department.php?id=<?php echo $department->id; ?>">Vedi info</a>
        </section>

    <?php } ?>
</body>
</html>