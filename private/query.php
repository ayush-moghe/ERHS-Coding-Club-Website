<?php

function register_user($user_data, $db) {

    $errors = r_validate_user($user_data, $db);

    if( $errors['present'] ) {
        return $errors;
    } else {

        $hashed_password = password_hash($user_data['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (sid, username, password, verified, role) VALUES (";
        $sql.= "'" . $user_data['sid'] . "',";
        $sql.= "'" . db_escape($db, $user_data['username']) . "',";
        $sql.= "'" . db_escape($db, $hashed_password) . "',";
        $sql.= "0,";
        $sql.= "'student')";

        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return true;
    }

}

function member_login($user_data, $db) {

    $sid = $user_data['sid'] ?? '';
    $username = $user_data['username'] ?? '';
    $password = $user_data['password'] ?? '';

    $sql = "SELECT * FROM users WHERE sid='";
    $sql.= db_escape($db, $sid) . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $fetched_data = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    $fetched_username = $fetched_data['username'] ?? '';
    $fetched_password = $fetched_data['password'] ?? '';

    if( $fetched_username === $username && password_verify($password, $fetched_password)) {
        login_user($fetched_data);
        return true;
    } else {
        return false;
    }

}