<?php require("connect.php") ?>

<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM todos WHERE id = $id";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        session_start();
        $_SESSION["delete"] = "Deleted Todo Successfully";
        header(('Location:index.php'));
    } else {
        die("Someting went wrong");
    }
}

?>

<?php mysqli_close($connection) ?>