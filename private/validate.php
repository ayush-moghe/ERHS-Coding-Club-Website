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
    $errors = ['first_name' => '', 'last_name' => '' ,'sid' => '', 'username' => '', 'password' => '', 'cpwd' => '', 'present' => false];

    if(!preg_match('/^[A-Z]{1}[a-z]{2}/', $user_data['first_name'])) {
        $errors['first_name'] = "First name must start with a capital letter, must have no numbers or special characters, and must be at least 3 characters long.";
        $errors['present'] = true;
    }

    if(!preg_match('/^[A-Z]{1}[a-z]{2}/', $user_data['last_name'])) {
        $errors['last_name'] = "Last name must start with a capital letter, must have no numbers or special characters, and must be at least 3 characters long.";
        $errors['present'] = true;
    }

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

function r_validate_teacher($user_data, $db) {

    $errors = ['first_name' => '', 'last_name' => '', 'username' => '', 'password' => '', 'cpwd' => '', 'present' => false];

    if(!preg_match('/^[A-Z]{1}[a-z]{2}/', $user_data['first_name'])) {
        $errors['first_name'] = "First name must start with a capital letter, must have no numbers or special characters, and must be at least 3 characters long.";
        $errors['present'] = true;
    }

    if(!preg_match('/^[A-Z]{1}[a-z]{2}/', $user_data['last_name'])) {
        $errors['last_name'] = "Last name must start with a capital letter, must have no numbers or special characters, and must be at least 3 characters long.";
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

function check_course_enrolled($course_id, $db) {
    $sql = "SELECT enrollment FROM users WHERE sid='";
    $sql .= db_escape($db, $_SESSION['sid']). "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $enrollment = mysqli_fetch_assoc($result)['enrollment'] ?? '';
    mysqli_free_result($result);

    $enrollment = explode(',', $enrollment);
    foreach($enrollment as $course) {
        if($course_id == $course) {
            return true;
        }
    }

    return false;

}

function check_if_role($db, $roles) {
    $user_roles = user_roles($_SESSION['username'], $db);
    $user_roles = explode(',', $user_roles);
    $roles = explode(',', $roles);

    foreach($user_roles as $role) {
        if( in_array($role, $roles, 1) ) {
            return true;
        }
    }
    return false;
}