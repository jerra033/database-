<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $newData = $_POST['newData'];

    $db = new Database();
    $db->updateData($id, $newData);
    $db->closeConnection();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Updaten</title>
</head>
<body>

<form method="post" action="">
    <label for="id">ID:</label>
    <input type="text" name="id" required><br>

    <label for="newData">Nieuwe Data:</label>
    <input type="text" name="newData" required><br>

    <input type="submit" value="Update">
</form>

</body>
</html>
