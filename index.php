<?php require("connect.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Todo</title>
</head>

<body>

    <div class="container text-center" style="width: 840px;">
        <h1 class="my-5 fw-bolder">My Todos</h1>

        <?php
        session_start();
        if (isset($_SESSION["add"])) {
        ?>
            <div class="alert alert-success">
                <?php
                echo $_SESSION["add"];
                unset($_SESSION["add"]);
                ?>
            </div>
        <?php
        }
        ?>
        <?php
        if (isset($_SESSION["edit"])) {
        ?>
            <div class="alert alert-success">
                <?php
                echo $_SESSION["edit"];
                unset($_SESSION["edit"]);
                ?>
            </div>
        <?php
        }
        ?>
        <?php
        if (isset($_SESSION["delete"])) {
        ?>
            <div class="alert alert-danger">
                <?php
                echo $_SESSION["delete"];
                unset($_SESSION["delete"]);
                ?>
            </div>
        <?php
        }
        ?>

        <div>
            <form class="d-flex my-4" action="addTodo.php" method="post">
                <input class="form-control" type="text" name="todo" placeholder="Add your todo" />
                <button type="submit" class="btn btn-primary mx-2" name="create">Submit</button>
            </form>
        </div>

        <?php
        $sql = "SELECT * FROM todos";
        $result = mysqli_query($connection, $sql);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        ?>

        <?php foreach ($rows as $row): ?>
            <div class="bg-light d-flex justify-content-between align-items-center my-4 px-2 rounded-2 shadow-sm" style="height: 52px;">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>"
                    <h4><?php echo $row["details"] ?></h4>
                <div class="my-4">
                    <a href="edit.php?id=<?php echo $row["id"] ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                    <a href="delete.php?id=<?php echo $row["id"] ?>" class="btn btn-danger" name="delete"><i class="bi bi-trash"></i></a>
                </div>
            </div>
        <?php endforeach; ?>





    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>

<?php mysqli_close($connection) ?>