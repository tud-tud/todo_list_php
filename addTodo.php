<?php require("connect.php") ?>

<?php
if (isset($_POST["create"])) {
    $title = mysqli_real_escape_string($connection, $_POST["todo"]);
    $sql_insert = "INSERT INTO todos (details) VALUE ('$title')";

    $result = mysqli_query($connection, $sql_insert);

    if ($result) {
        session_start();
        $_SESSION["add"] = "Added Todo Successfully";
        header(('Location:index.php'));
    } else {
        die("Someting went wrong");
    }
}
?>

<?php mysqli_close($connection) ?>