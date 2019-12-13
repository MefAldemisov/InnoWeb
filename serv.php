<?php
session_start();


$client = new Client;
if (validate($_POST)) {
    validateEmail($_POST["email"]);
    $client->checkData($_POST);
    fillSession($client);

    /** TODO DB work */
    var_dump($client);
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



function validateEmail($email)
{
    if (preg_match("/.com$/", $email) || preg_match("/.org$/", $email)) {
        return true;
    } else {
        header("location: /?error_spec_email='Invalid pattern'");
    }
}

function fillSession($client) {
    $fields = ["time", "name", "phone", "email", "file", "places", "total"];
    foreach($fields as $f) {
        
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
}
