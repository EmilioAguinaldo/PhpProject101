<?php

    include "common.php";

    // Delete cookie
    setcookie($cookie_name, "", time() - 3600, "/");

    $li_unameErr = NULL;
    $li_uname = NULL;
    $li_passErr = NULL;
    $li_pass = NULL;

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        include "views/login.php";
    }
    elseif ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["username"])) {
            $li_unameErr = "Please enter your username!";
        } else {
            $li_uname = $_POST["username"];
        }
        if (empty($_POST["pass"])) {
            $li_passErr = "Please enter your password!";
        }else {
            $li_pass = $_POST["pass"];
        }

        if ( $li_uname == NULL or $li_pass == NULL) {
            include "views/login.php";
        }
        else {
            // Location of user's data
            $file_path = "users/" . $li_uname . ".json";
            if (file_exists($file_path)) {
                // Read the data if file exist
                $db = json_reader($file_path);
                // Compare the password from the file
                if ($db->psw == $li_pass) {
                    // Save to cookie to be used as "remember me" when 
                    // viewing other pages except login
                    setcookie($cookie_name, $li_uname, time() + (86400 * 30), "/");
                    // Go automatically to profile page
                    redirect("profile.php");
                }
            }
        }
    }
