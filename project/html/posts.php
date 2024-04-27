<?php
    $link = mysqli_connect('db', 'root', '123', 'first');

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM posts WHERE id=$id";
        $res = mysqli_query($link, $sql);

        if(mysqli_num_rows($res) > 0) {
            $rows = mysqli_fetch_array($res);
            $title = $rows['title'];
            $main_text = $rows['main_text'];
        }
    }
          
?>

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
    <?php
        echo "<h2>$title</h2>";
        echo "<p>$main_text</p>";
    ?>
</body>
</html>