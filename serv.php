<!doctype html>
<html>

<head>
    <title>server</title>
</head>

<body>

    <?php
    require 'vendor/autoload.php';

    use PHPMailer\PHPMailer\PHPMailer;

    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    include('Database.php');

    define('CLIENTS', __DIR__ . "/clients.txt");
    session_start();

    // DB init
    $pdo = new Database;
    $logpdo = new Database;
    $pdo->connect("users.db", "users");
    $logpdo->connect("logs.db", "logs");
    $pdo->createTable();
    $logpdo->createTableLog();

    $client = new Client;
    if (validate($_POST)) {
        validateEmail($_POST["email"]);
        $client->checkData($_POST);
        fillSession($client);

        // files
        $file_path = "";
        if (isset($_FILES)) {
            foreach ($_FILES as $file) {
                if (fileIsImage($file)) {
                    $file_path = saveFile($file);
                    cookFile($file);
                }
            }
        }

        /** DB work */
        $id = $client->saveToDatabase($pdo);

        $data = [];
        $columns = ["name", "phone", "email", "places", "total"];
        foreach ($columns as $col) {
            $data[$col] = $_POST[$col];
        }
        
        $log_data = [];
        $log_data["order_id"] = $id;
        $log_data["admin_time"] = time();
        if (sendAdminMail($client)) {
            echo "start sending";       
            $log_data["result"] = sendMail($client, $file_path);
            $log_data["user_time"] = time();
        }else{
            $log_data["result"] = "-";
            $log_data["user_time"] = "-";
        }
        $logpdo->createRecordLog($log_data);
        echo " Recorded";

        // $pdo->showRecords($id);
        // header("location: /thanks.php?name=" . $_POST["name"] . "&id=" . $id);
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
        echo "GGGG";
    }

    function saveFile($file)
    {
        $name = time();
        // resize
        $target = resizeTo($file, 1000);
        $type = getimagesize($file['tmp_name'])[2];

        $dir = __DIR__ . "/uploads/";
        $upload_file = $dir . $name;
        echo "<br>PATH: " . $upload_file;
        // image saving 
        if ($type == IMAGETYPE_JPEG) {
            imagejpeg($target, $upload_file . ".jpeg");
        } elseif ($type == IMAGETYPE_GIF) {
            imagegif($target, $upload_file . ".gif");
        } elseif ($type == IMAGETYPE_PNG) {
            imagepng($target, $upload_file . ".png");
            $upload_file .= ".png";
            echo "<img src='uploads/" . $name . ".png' alt='png image'/><br>";
        }
        return $upload_file;
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

        public function saveToDatabase($pdo)
        {
            $columns = ["name", "phone", "email", "places", "total"];
            foreach ($columns as $col) {
                $data[$col] = $_POST[$col];
            }
            return $pdo->createRecord($data); //id
        }
    }

    function fileIsImage($file)
    {
        return @is_array(getimagesize($file['tmp_name']));
    }

    function sendMail($client, $file_name)
    {
        // thought library
        try {
            $mail = new PHPMailer(true);                    // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.yandex.ru';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'helbogd@yandex.ru';                     // SMTP username
            $mail->Password   = '1234512345';                               // SMTP password
            $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 465;     // TCP port to connect to

            $mail->setFrom('helbogd@yandex.ru', 'Mailer');
            $mail->addAddress('helbogd@yandex.ru');     // Add a recipient



            $mail->addAttachment($file_name);         // Add attachments
            $mail->isHTML(true);

            $mail->subject = "Заявка с сайта";
            $message = "<body><p>Пользователь <b>" . $client->name . "</b> оставил заявку " . "</p><br>";
            $message .= "<p>Телефон " . $client->phone;
            $message .= "</p></body>";

            $mail->Body = $message;
            echo "<br>Send....";
            $mail->send();
            echo "sended";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return "error";
        }
        return "success";
    }
    function sendAdminMail($client)
    {
        // thought library
        try {
            $mail = new PHPMailer(true);                    // Enable verbose debug output
            echo "CreatedAdmin";
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.yandex.ru';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'helbogd@yandex.ru';                     // SMTP username
            $mail->Password   = '1234512345';                               // SMTP password
            $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 465;     // TCP port to connect to

            $mail->setFrom('helbogd@yandex.ru', 'Mailer');
            $mail->addAddress('helbogd@yandex.ru');     // Add a recipient

            $mail->subject = "Заявка с сайта";
            $message = "<body><p>Пользователь <b>" . $client->name . "</b> оставил заявку " . "</p></body>";

            $mail->Body = $message;
            echo "<br>Send....";
            $mail->send();
            echo "sended";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return false;
        }
        return true;
    }
    class Mail
    {
        const MAILTO = "alisha-omg@yandex.ru";

        public function send($data)
        {
            /**
             * Highly non-recommented (for testing only)
             */
            $headers = "MIME-Version: 1.0" . "\r\n";
            // text/html - possible
            $headers .= "Content-type: text/html; charset-utf-8" . "\r\n";
            $headers .= "From: ROBOT_SITE <info@{$_SERVER["SERVER_NAME"]}\r\n>";

            $subject = "Заявка с сайта";
            $message = "<body><p>Пользователь <b>" . $data["name"] . "</b> оставил заявку " . "</p><br>";
            $message .= "<p>Телефон " . $data["phone"];
            $message .= "</p></body>";
            mail($this::MAILTO, $subject, $message, $headers);
        }
    }


    ?>
</body>

</html>