<?php

    $subject = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
    if(isset($_POST['lets_search'])) {
        $getPost = explode("\"", $_POST['search']);
        $expPattern = explode(" ", $getPost[0]);
        $newExp = array_diff($expPattern, array(''));
        $explode = explode(" ", $getPost[1]);
        foreach ($explode as $row => $value){
            $explode[$row] = '"'. $explode[$row];
        }
        $replacements = array();
        $colored = array();
        $colored_once = [];
        $pattern_once = [];
        $array = array();
        foreach ($newExp as $key) {
            $colored[] = '<b style="color: red;">' . $key . '</b>';
            $replacements[] = "/" . $key . "/";
        }
        $subject = preg_replace($replacements, $colored, $subject);

        if (strstr($explode[0], "\"")) {
            for ($i = 0; $i < count($explode); $i++) {
                $implode = implode(" ", $explode);
                $array = str_replace('"', '', $implode);
                $colored_once = '<b style="color: red;">' . $array . '</b>';
                $pattern_once = "/" . $array . "/";
            }
        }
        $subject = preg_replace($pattern_once, $colored_once, $subject, 1);
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fourth</title>
</head>
<body>
<h1>Найти строку в тексте</h1>
<form action="index.php" method="post">
    <label for="key">Ключевая строка: </label>
    <input type="text" name="search" id="key">
    <button type="submit" name="lets_search">Поиск</button>
    <hr>
</form>

<div class="text">
    <p>
        <?php
            echo $subject;
        ?>
    </p>
</div>

</body>
</html>