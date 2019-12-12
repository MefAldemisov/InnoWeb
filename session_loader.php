<?php
$fields = ["time", "name", "phone", "email", "file", "places", "total"];
foreach($fields as $f) {
    if (isset( $_SESSION[$f])) {
        echo $_SESSION[$f];
    }
}