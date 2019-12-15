<!DOCTYPE html>
<html>

<head>
    <title>Admin page</title>
    <style>
        form {
            font-size: 1.2rem;
        }

        .submit {
            background-color: #fff;
            padding: 0.7rem 1rem;
            border-color: #000;
            border-radius: 0.5rem;
            cursor: pointer;

        }

        .submit:hover {
            background-color: grey;
        }

        select {
            background-color: #fff;
        }
    </style>
</head>

<body>
    <h1>Hello, admin!</h1>
    <form action="index.php" method="GET">
        <div>
            <label>Filter data by</label>
            <select name="filter" required>
                <option value="id" default>Id</option>
                <option value="name">Name</option>
                <option value="phone">Phone</option>
                <option value="email">Email</option>
                <option value="total">Total</option>
            </select>
            <button class="submit" type="submit">Filter</button>
        </div>

    </form>
    <h2>Data</h2>
    <?php
    include("../Database.php");
    $pdo = new Database;
    $pdo->connect("users.db");
    $pdo->createTable();
    if (isset($_GET["filter"]) && $_GET["filter"]) {
        $filter =  $_GET["filter"];
    } else {
        $filter = "id";
    }
    echo "<p>Data is filtered by <strong>" . $filter . "</strong></p>";
    $request = $pdo->getRecords($filter);
    $pdo->showRecords($request);
    ?>
</body>

</html>