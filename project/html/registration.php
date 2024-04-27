<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Валиулин И.Р.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.cdnfonts.com/css/aniron" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Registration</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form method="POST" action="registration.php">
                    <div class="row form__reg"><input class="form"type="email"name="email"placeholder="Email"></div>
                    <div class="row form__reg"><input class="form"type="text"name="username"placeholder="Username"></div>
                    <div class="row form__reg"><input class="form"type="password"name="password"placeholder="Password"></div>
                    <button type="submit" class="btn_reg btn__reg" name="submit">Continue</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
require_once('db.php');

$link = mysqli_connect('db', 'root', '123', 'first');

if (!$link) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

if (isset($_COOKIE['User'])) {
    header("Location: login.php");
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!$email || !$username || !$password) {
        die ('Пожалуйста, введите все значения!');
    }

    $sql = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password')";

    if (!mysqli_query($link, $sql)) {
        echo "Не удалось добавить пользователя";
    } else {
        echo "Пользователь успешно добавлен";
    }
}

mysqli_close($link);
?>

