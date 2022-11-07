<?php

function login_user($user_data) {
    session_regenerate_id();
    $_SESSION['first_name'] = $user_data['first_name'];
    $_SESSION['last_name'] = $user_data['last_name'];
    $_SESSION['sid'] = $user_data['sid'];
    $_SESSION['username'] = $user_data['username'];

}

function login_teacher($user_data) {
    session_regenerate_id();
    $_SESSION['first_name'] = $user_data['first_name'];
    $_SESSION['last_name'] = $user_data['last_name'];
    $_SESSION['sid'] = 'Teacher';
    $_SESSION['username'] = $user_data['username'];
}

function logout_user() {
    unset($_SESSION['first_name']);
    unset($_SESSION['last_name']);
    unset($_SESSION['sid']);
    unset($_SESSION['username']);
    session_destroy();
}

function require_login($redirect_url) {
    if( !isset($_SESSION['sid']) ) {
        redirect_to($redirect_url);
    }
}

function require_role($roles, $db) {

    if( !check_if_role($db, $roles) ) {
        redirect_to('../index.php');
    }

}