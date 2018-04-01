<?php

    include "common.php";

    $fullname = NULL;
    $email = NULL;
    $username = NULL;
    $gender = NULL;
    $psw = NULL;
    $psw_repeat = NULL;
    $hide_modal = TRUE;

    $err_fullname = NULL;
    $err_email = NULL;

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        include "views/register.php";
    }
    elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
        $hide_modal = FALSE;
        $fullname = $_POST["fullname"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $gender = $_POST["gender"];
        $psw = $_POST["psw"];
        $psw_repeat = $_POST["psw_repeat"];

        $file_path = "users/" . $username . ".json";
        if (file_exists($file_path)) {
            $err_username = "Username already exist";
        }
        $is_alpha_space = preg_match('/^[a-z\s]*$/i', $fullname);
        if ($is_alpha_space == 0) {
            $err_fullname = "Invalid full name input.<br>";
        }
        $is_email_valid = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$is_email_valid) {
            $err_email = "Invalid email input.<br>"; 
        }

        // Check if there are no errors in fullname, email or username
        if ($err_fullname == NULL and $err_email == NULL and $err_username == NULL) {
            // Save data to file with username as filename and 
            // json as extension name in users folder
            $user_filepath = "users/" . $username . ".json";
            json_writer($user_filepath, $_POST);
            // Save to cookie to be used as "remember me" when 
            // viewing other pages except login
            setcookie($cookie_name, $username, time() + (86400 * 30), "/");
            // Go automatically to profile page
            redirect("profile.php");
        }
        else {
            include "views/register.php";
        }
    }



