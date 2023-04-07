
<?php
include 'config.php';

$stmt = $pdo->query('SELECT * FROM users');
$users = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP CRUD with PDO</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
    </style>
</head>
<body>
    <h1>Users</h1>
    <a href="add.php">Add User</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) { ?>
            <tr>
                <td><?php echo $user['id'] ?></td>
                <td><?php echo $user['name'] ?></td>
                <td><?php echo $user['email'] ?></td>
                <td><?php echo $user['password'] ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $user['id'] ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $user['id'] ?>">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
