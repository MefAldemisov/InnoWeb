<!doctype html>
<html>

<head>
    <title>server</title>
</head>

<body>

    <?php

    define('CLIENTS', __DIR__ . "/clients.txt");
    session_start();

    // DB init
    $pdo = new Database;
    $pdo->connect("users.db");
    $pdo->createTable();

    $client = new Client;
    if (validate($_POST)) {
        validateEmail($_POST["email"]);
        $client->checkData($_POST);
        fillSession($client);

        // files
        if (isset($_FILES)) {
            foreach ($_FILES as $file) {
                if (fileIsImage($file)) {
                    saveFile($file);
                    cookFile($file);
                }
            }
        }

        /** DB work */

        $columns = ["name", "phone", "email", "places", "total"];
        foreach($columns as $col){
            $data[$col] = $_POST[$col];
        }
        $id = $pdo->createRecord($data);
        echo "<br>ID :" . $id;
        $pdo->showRecords();    
        // header("location: /thanks.php?name=" . $_POST["name"]);
    } else {

        $req_fields = ["name", "phone", "email"];
        $error_msg = "location: /?";
        foreach ($req_fields as $field) {
            if (!(isset($_POST[$field]) && $_POST[$field])) {
                $error_msg .= "error_" . $field . "='Not filled'&";
            }
        }
        header(substr($error_msg, 0, -1));
    }

    function makeImageFromPath($tmp_name, $type)
    {
        if ($type == IMAGETYPE_JPEG) {
            echo "<h2>JPEG</h2>";
            return imagecreatefromjpeg($tmp_name);
        } elseif ($type == IMAGETYPE_GIF) {
            echo "<h2>GIF</h2>";
            return imagecreatefromgif($tmp_name);
        } elseif ($type == IMAGETYPE_PNG) {
            echo "<h2>PNG</h2>";
            return imagecreatefrompng($tmp_name);
        }
        return 0;
    }

    function resizeTo($file, $maxDim)
    {
        list($width, $height, $type, $attr) = getimagesize($file['tmp_name']);
        $image_resource_id = makeImageFromPath($file["tmp_name"], $type);

        // create target to copy to
        $target_height = ($height > $maxDim) ? $height : $height;
        $target_width = ($width > $maxDim) ? $width : $width;
        $target = imagecreatetruecolor($target_width, $target_height);

        imagecopyresampled($target, $image_resource_id, 0, 0, 0, 0, $target_width, $target_height, $width, $height);
        return $target;
    }

    function cookFile($file)
    {
        $target = resizeTo($file, 100);
        setcookie("image", $target);
    }

    function saveFile($file)
    {
        $name = time();
        // resize
        $target = resizeTo($file, 1000);
        $type = getimagesize($file['tmp_name'])[2];

        $dir = __DIR__ . "/uploads/";
        $upload_file = $dir . $name;

        // image saving 
        if ($type == IMAGETYPE_JPEG) {
            imagejpeg($target, $upload_file . ".jpeg");
        } elseif ($type == IMAGETYPE_GIF) {
            imagegif($target, $upload_file . ".gif");
        } elseif ($type == IMAGETYPE_PNG) {
            imagepng($target, $upload_file . ".png");
            echo "<img src='uploads/" . $name . ".png' alt='png image'/><br>";
        }
    }

    function validateEmail($email)
    {
        if (preg_match("/.com$/", $email) || preg_match("/.org$/", $email)) {
            return true;
        } else {
            header("location: /?error_spec_email='Invalid pattern'");
        }
    }

    function fillSession($client)
    {
        $fields = ["time", "name", "phone", "email", "file", "places", "total"];
        foreach ($fields as $f) {

            if (isset($client->$f)) {

                $_SESSION[$f] = $client->$f;
            }
        }
    }

    function validate($data) // also can be used for cookey
    {
        $result = true;
        if (!(isset($data["agree"]) && $data["agree"] == "on")) {
            $result = false;
        }

        $req_fields = ["name", "phone", "email"];

        foreach ($req_fields as $field) {
            if (!(isset($data[$field]) && $data[$field])) {
                $result = false;
            } else {
                setcookie($field, $_POST[$field]);
            }
        }
        return $result;
    }

    class Client
    {
        public
            $time,
            $name,
            $phone,
            $email,
            $file,
            $places,
            $total;

        function __construct()
        {
            $time = time();
        }

        public function checkData($data)
        {
            $field = "name";
            $this->name = $data[$field];
            $field = "phone";
            $this->phone = $data[$field];
            $field = "email";
            $this->email = $data[$field];

            $field = "file";
            if (isset($data[$field]) && $data[$field]) {
                $this->file = $data[$field];
            }
            $field = "places";
            if (isset($data[$field]) && $data[$field]) {
                $this->places = $data[$field];
            }
            $field = "total";
            if (isset($data[$field]) && $data[$field]) {
                $this->total = $data[$field];
            }
        }

        public function saveToFile()
        {
            $data = file_get_contents(CLIENTS);
            $new_data = "Name: " . $this->name . "\r\n";
            $new_data .= "Phone: " . $this->phone . "\r\n";
            $new_data .= "Email: " . $this->email . "\r\n";
            if (isset($this->places)) {
                $new_data .= "Places: " . $this->places . "\r\n";
            }
            if (isset($this->total)) {
                $new_data .= "Total cost: " . $this->total . "\r\n";
            }
            $new_data .= "--------------------" . "\r\n";
            $res = file_put_contents(CLIENTS, $data . $new_data);
        }
    }

    function fileIsImage($file)
    {
        return @is_array(getimagesize($file['tmp_name']));
    }

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

        public function showRecords()
        { 
            $sql = "SELECT * FROM users ORDER BY Id;";
            $request = $this->pdo->prepare($sql);
            echo "<br> Prepared";
            if ($request) {
                $request->execute();
            }
            $records = [];
 
            echo "<table><tr><th>ID</th>
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
            echo "</table>";

            
            return $records;
            // return $request;
        }
    }

    ?>
</body>

</html>