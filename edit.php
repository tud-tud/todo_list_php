<?php require("connect.php") ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Update Todo</title>
</head>

<body>
    <div class="container text-center" style="width: 840px;">
        <h1 class="my-5 fw-bolder">Edit Todo</h1>
        <?php
        $value = "";
        if (isset($_GET['id']));
        $id = $_GET['id'];
        $sql = "SELECT * FROM todos WHERE id = '$id'";
        $result = mysqli_query($connection, $sql);
        $value = mysqli_fetch_array($result);
        ?>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            $title = mysqli_real_escape_string($connection, $_POST["todo"]);
            $id = $_GET['id'];
            $sql = "UPDATE todos SET details ='$title' WHERE id=$id";
            $result = mysqli_query($connection, $sql);

            if ($result) {
                session_start();
                $_SESSION["edit"] = "Upate Todo Successfully";
                header(('Location:index.php'));
            } else {
                die("Someting went wrong");
            }
        }
        ?>

        <div>
            <form class="d-flex my-4" action="" method="post">
                <input class="form-control" type="text" name="todo" value="<?php echo $value["details"]; ?>" />
                <button type="submit" class="btn btn-primary mx-2" name="edit">Update</button>
            </form>
        </div>

    </div>

</body>

</html>

<?php mysqli_close($connection) ?>