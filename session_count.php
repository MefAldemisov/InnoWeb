<?php
$var_name = "counter";
if (isset($_COOKIE[$var_name])){
    setcookie($var_name, $_COOKIE[$var_name] + 1);
} else {
    setcookie($var_name, 0);
}
echo $_COOKIE[$var_name];
