<?php
    $current_page = $_SERVER["PHP_SELF"];
    $cookie_name = "project101";
    
    function redirect($url, $statusCode = 303) {
       header('Location: ' . $url, true, $statusCode);
       die();
    }

    function read_file($file_path) {
        $file_size = filesize($file_path);
        $file_handle = fopen($file_path, "r") or die("Unable to open file!");
        $view_data = fread($file_handle, $file_size);
        fclose($file_handle);
        return $view_data;
    }

    function json_writer($file_path, $buffer) {
        $encoded_buffer = json_encode($buffer);
        $file_handle = fopen($file_path, "w") or die("Unable to open file!");
        fwrite($file_handle, $encoded_buffer);
        fclose($file_handle);
    }

    function json_reader($file_path) {
        $buffer = read_file($file_path);
        $decoded_buffer = json_decode($buffer);
        return $decoded_buffer;
    }