<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login!</h1>
    <form action="login.php" method="POST">
        <fieldset>
            <p>
                <input type="text" name="name" placeholder="enter a name">
                <input type="password" name="password" placeholder="enter a password">
                <button type="submit">Login</button>
            </p>
        </fieldset>
    </form>
    <div>
            <?php
    $host="localhost";
    $user="root";
    $pass="";
    $db="userdb";
    $conn = mysqli_connect($host, $user, $pass, $db);

    $result = mysqli_query($conn, "SELECT password FROM users WHERE name = '{$_POST['name']}'");
    $row = mysqli_fetch_assoc($result);
    if ($_POST['password'] == $row['password']) {
        $result_1 = mysqli_query($conn, "SELECT name FROM users WHERE name = '{$_POST['name']}'");
        $row_1 = mysqli_fetch_assoc($result_1);
        echo "Hi, {$row_1['name']}";
    } else {
        echo "invalid password";
    }
?>
    </div>
</body>
<style>
    body {
        display: flex;
        flex-direction: column;
        height: 100vh;
        justify-content: center;
        align-items: center;
    }
    button {
        font-size: 15px;
    }
</style>
</html>