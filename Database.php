<?php
class Database
{
    private $pdo;
    private $table_name;

    public function connect($table_name)
    {
        $this->table_name = $table_name;
        if (!$this->pdo) {
            try {
                $this->pdo = new PDO("sqlite:" . __DIR__ . "/" . $table_name);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'Exception : ' . $e->getMessage();
            }
        }
    }
    public function createTable()
    {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS users (
                        Id INTEGER PRIMARY KEY AUTOINCREMENT, 
                        Name TEXT, 
                        Phone TEXT, 
                        Email TEXT,
                        Places TEXT,
                        Total INTEGER,
                        Time TEXT
                        )");
    }

    public function createRecord($data)
    {
        // data - array with keys name and phone
        $data["time"] = time();
        $sql = "INSERT INTO users (Name, Phone, Email, Places, Total, Time) 
                VALUES (:name, :phone, :email, :places, :total, :time)";
        $request = $this->pdo->prepare($sql);
        if ($request) {
            $request->execute($data);
        } else {
            echo $this->pdo->exec("SELECT * FROM users");
        }
        return $this->pdo->lastInsertId();
    }

    public function getRecords($filter_by)
    {
        $sql = "SELECT * FROM users ORDER BY " . $filter_by;
        $request = $this->pdo->prepare($sql);
        if ($request) {
            $request->execute();
        }
        return $request;
    }
    public function showRecords($request)
    {
        echo "<tr><th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Places</th>
                <th>Total</th></<tr>";
        while ($row = $request->fetch(\PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['Id'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Phone'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "<td>" . $row['Places'] . "</td>";
            echo "<td>" . $row['Total'] . "</td>";
            echo "</tr>";
        }
        
    }
    public function deleteRecord($id) {
        $sql = "DELETE FROM users WHERE Id = " . $id;
        $request = $this->pdo->prepare($sql);
        if ($request) {
            $request->execute();
        } else {
            echo " ERROR IN DELETE ";
        }
    }
    public function updateRecord($data) {
        $sql = "UPDATE users 
                SET Name=:name, 
                Phone=:phone, 
                Email=:email, 
                Places=:places, 
                Total=:total
                WHERE Id=:id";
        $request = $this->pdo->prepare($sql);
        if ($request) {
            $request->execute($data);
        } else {
            echo " ERROR IN UPDATE ";
        }

    }
}
