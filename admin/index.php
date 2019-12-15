<!DOCTYPE html>
<html>

<head>
    <title>Admin page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <style>
        form {
            font-size: 1.2rem;
        }

        .table-container {
            height: 80vh;
            overflow-y: scroll;
            border: 2px black solid;
            border-radius: 1rem;
        }

        .row {
            margin-bottom: 1rem;
        }
    </style>
</head>

<body class="container">
    <h1>Hello, admin!</h1>
    <main class="row">
        <section class="col-sm-4">
            <h2>Functions</h2>
            <form class="row" action="index.php" method="GET">
                <div class="input-group">
                    <label class="input-group-addon">Filter by</label>

                    <select class="form-control" name="filter" required>
                        <option value="id" default>Id</option>
                        <option value="name">Name</option>
                        <option value="phone">Phone</option>
                        <option value="email">Email</option>
                        <option value="total">Total</option>
                    </select>
                    <div class="input-group-btn">
                        <button class="btn btn-success" type="submit">Filter</button>
                    </div>
                </div>
            </form>
            <form class="row" action="index.php" method="GET">
                <div class="input-group">
                    <label class=" input-group-addon">Selected id</label>
                    <input class="form-control" type="number" name="id" readonly>
                    <div class="input-group-btn">
                        <button class="btn btn-success" type="submit">Delete selected</button>
                    </div>
                </div>
            </form>
            <form class="row" action="index.php" method="POST">
                <input type="hidden" name="id">
                <div class="input-group">
                    <label class=" input-group-addon">Name</label>
                    <input class="form-control" type="text" name="name">
                </div>
                <div class="input-group">
                    <label class=" input-group-addon">Phone</label>
                    <input class="form-control" type="text" name="phone">
                </div>
                <div class="input-group">
                    <label class=" input-group-addon">Email</label>
                    <input class="form-control" type="text" name="email">
                </div>
                <div class="input-group">
                    <label class=" input-group-addon">Places</label>
                    <input class="form-control" type="text" name="places">
                </div>
                <div class="input-group">
                    <label class=" input-group-addon">Total</label>
                    <input class="form-control" type="number" name="total">
                </div>
                <button class="form-control btn btn-success" type="submit">Update selected</button>
            </form>
        </section>
        <section class="col-sm-8">
            <h2>Data</h2>
            <div class="table-container">
                <table class="table table-hover">
                    <?php
                    include("../Database.php");
                    $pdo = new Database;
                    $pdo->connect("users.db");
                    $pdo->createTable();

                    if (isset($_GET["id"]) && $_GET["id"]) {
                        $pdo->deleteRecord($_GET["id"]);
                    }

                    if (isset($_POST["name"]) && $_POST["name"]) {
                        $pdo->updateRecord($_POST); // all parameters should be in the POST array
                    }

                    if (isset($_GET["filter"]) && $_GET["filter"]) {
                        $filter =  $_GET["filter"];
                    } else {
                        $filter = "id";
                    }
                    echo "<p>*Data is filtered by <strong>" . $filter . "</strong></p>";
                    $request = $pdo->getRecords($filter);
                    $pdo->showRecords($request);
                    ?>
                </table>
            </div>
        </section>
    </main>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    // 1. put event listener on all rows -> copy text to input fields
    // 2. 
    $("tr").click(function() {
        console.log($(this).children().eq(1).html())
        let data = [];
        data["id"] = $(this).children().eq(0).html()
        data["name"] = $(this).children().eq(1).html()
        data["phone"] = $(this).children().eq(2).html()
        data["email"] = $(this).children().eq(3).html()
        data["places"] = $(this).children().eq(4).html()
        data["total"] = $(this).children().eq(5).html()

        $("input[name=id]").val(data["id"])
        $("input[name=name]").val(data["name"])
        $("input[name=phone]").val(data["phone"])
        $("input[name=email]").val(data["email"])
        $("input[name=places]").val(data["places"])
        $("input[name=total]").val(data["total"])
    })
</script>

</html>