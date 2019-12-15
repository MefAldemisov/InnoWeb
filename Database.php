<?php
class Database
{
    private $pdo;
    private $table_name;

    public function connect($table_address, $table_name)
    {
        $this->table_name = $table_name;
        if (!$this->pdo) {
            try {
                $this->pdo = new PDO("sqlite:" . __DIR__ . "/" . $table_address);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'Exception : ' . $e->getMessage();
            }
        }
    }
    public function createTable()
    {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS " . $this->table_name . " (
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
        $sql = "INSERT INTO " . $this->table_name . " (Name, Phone, Email, Places, Total, Time) 
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
        $sql = "SELECT * FROM " . $this->table_name . " ORDER BY " . $filter_by;
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
        $sql = "DELETE FROM " . $this->table_name . " WHERE Id = " . $id;
        $request = $this->pdo->prepare($sql);
        if ($request) {
            $request->execute();
        } else {
            echo " ERROR IN DELETE ";
        }
    }
    public function updateRecord($data) {
        $sql = "UPDATE " . $this->table_name . " 
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
    public function createTableLog() {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS " . $this->table_name . " (
            id INTEGER PRIMARY KEY AUTOINCREMENT, 
            order_id INTEGER,
            result TEXT,
            admin_time TEXT,
            user_time TEXT
            )");
    }
    public function createRecordLog($data) {
        $sql = "INSERT INTO " . $this->table_name . " (order_id, result, admin_time, user_time) 
                VALUES (:order_id, :result, :admin_time, :user_time)";
        $request = $this->pdo->prepare($sql);
        echo "PREPARED";
        if ($request) {
            $request->execute($data);
        } else {
            echo $this->pdo->exec("SELECT * FROM " . $this->table_name );
        }
        return $this->pdo->lastInsertId();
    }
    public function getLogRecords()
    {
        $sql = "SELECT * FROM " . $this->table_name ;
        try {
            $request = $this->pdo->prepare($sql);
        } catch (PDOException $e) {
            echo 'Exception : ' . $e->getMessage();
        }
        if ($request) {
            $request->execute();
        }
        return $request;
    }
    public function showLogRecords($request)
    {
        echo "<tr><th>ID</th>
                <th>Order_id</th>
                <th>Result</th>
                <th>Admin Time</th>
                <th>User Time</th></<tr>";
        while ($row = $request->fetch(\PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['order_id'] . "</td>";
            echo "<td>" . $row['result'] . "</td>";
            echo "<td>" . $row['admin_time'] . "</td>";
            echo "<td>" . $row['user_time'] . "</td>";
            echo "</tr>";
        }
        
    }
}
