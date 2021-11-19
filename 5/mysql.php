<?php
$conn = mysqli_connect("localhost", "root", "", "training");
if ($conn === false) {
    die("Ошибка: " . mysqli_connect_error());
}