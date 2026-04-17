<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
</head>
<body>
    <h1>Sign up!</h1>
    <form action="signup.php" method="POST">
        <fieldset>
            <p>
                <input type="text" name="name" placeholder="enter a name">
                <input type="password" name="password" placeholder="enter a password">
                <button type="submit">sign up</button>
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

    mysqli_query($conn, "INSERT INTO users (name, password) VALUES ('{$_POST['name']}', '{$_POST['password']}')");

    $result = mysqli_query($conn, "SELECT name FROM users WHERE name = '{$_POST['name']}'");
    $row = mysqli_fetch_assoc($result);

    echo "success to add new user, " . $row['name'];
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