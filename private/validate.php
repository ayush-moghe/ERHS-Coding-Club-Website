<?php

function sid_exists($sid, $db) {

    $sql = "SELECT * FROM users WHERE sid='";
    $sql.= $sid . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $user_count = mysqli_num_rows($result);
    mysqli_free_result($result);

    return $user_count === 0 ? false : true;

}



function user_exists($username, $db) {

    $sql = "SELECT * FROM users WHERE username='";
    $sql.= $username . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $user_count = mysqli_num_rows($result);
    mysqli_free_result($result);

    return $user_count === 0 ? false : true;

}

function r_validate_user($user_data, $db) {
    $errors = ['sid' => '', 'username' => '', 'password' => '', 'cpwd' => '', 'present' => false];

    if( !preg_match('/^[0-9]{6}$/', $user_data['sid'])) {
        $errors['sid'] = 'Student ID must be 6 digits';
        $errors['present'] = true;
    } elseif (sid_exists($user_data['sid'], $db)) {
        $errors['sid'] = "Student ID already exists";
        $errors['present'] = true;
    }

    if(!preg_match('/[a-zA-Z][a-zA-Z0-9-_]{3,32}/i', $user_data['username'])) {
        $errors['username'] = 'Must start with an alphabetic character. Can contain the following characters: a-z A-Z 0-9 - and _';
        $errors['present'] = true;
    } elseif (user_exists($user_data['username'], $db)) {
        $errors['username'] = "Username already exists";
        $errors['present'] = true;
    }

    if(!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/', $user_data['password'])) {
        $errors['password'] = 'Password must be at least 8 characters, must contain at least 1 uppercase letter, 1 lowercase letter, and 1 number, can contain special characters';
        $errors['present'] = true;
    } elseif ($user_data['password'] !== $user_data['cpwd']) {
        $errors['cpwd'] = 'Passwords do not match';
        $errors['present'] = true;
    }

    return $errors;


}