<?php 
var_dump($_POST);
$client = new Client;
if (validate($_POST)){
    $client->checkData($_POST);
} else {
    header("location: /");
}
echo "Hey!";
var_dump($client);


function validate($data) {
    $field = "name";
    if (isset($data[$field]) && $data[$field]) {
        return true;
    }
    return false;
}

class Client {
    public $name, $phone, $email, $file, $agree;

    public function checkData($data) {
        $field = "name";
        $this->name = $data[$field];
        
        $field = "phone";
        if (isset($data[$field]) && $data[$field]) {
            $this->phone = $data[$field];
        }
        $field = "email";
        if (isset($data[$field]) && $data[$field]) {
            $this->email = $data[$field];
        }
        $field = "file";
        if (isset($data[$field]) && $data[$field]) {
            $this->file = $data[$field];
        }
        $field = "agree";
        if (isset($data[$field]) && $data[$field]) {
            $this->agree = $data[$field];
        }
    }
}