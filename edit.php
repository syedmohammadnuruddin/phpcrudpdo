<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare('UPDATE users SET name = ?, email = ?, password = ? WHERE id = ?');
    $stmt->execute([$name, $email, $password, $id]);

    header('Location: index.php');
    exit();
}

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
$stmt->execute([$id]);
$user = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <style>

</style>
</head>
<body>
<form method="post">
    <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" value="<?php echo $user['name'] ?>"><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" value="<?php echo $user['email'] ?>"><br>

    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" value="<?php echo $user['password'] ?>"><br>

    <input type="submit" value="Submit">
</form>

</body>
</html>
