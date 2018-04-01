<?php
    include "common.php";
    
    if(!isset($_COOKIE[$cookie_name])) {
        redirect("login.php");
        exit;
    } else {
        echo "Cookie '" . $cookie_name . "' is set!<br>";
        echo "Value is: " . $_COOKIE[$cookie_name];
        $file_path = "users/" . $_COOKIE[$cookie_name] . ".json";
        $user = json_reader($file_path);
        var_dump($user);
    }

    include "views/profile.php";