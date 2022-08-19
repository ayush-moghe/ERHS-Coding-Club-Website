<?php

function login_user($user_data) {
    session_regenerate_id();
    $_SESSION['sid'] = $user_data['sid'];
    $_SESSION['username'] = $user_data['username'];

}

function logout_user() {
    unset($_SESSION['sid']);
    unset($_SESSION['username']);
    session_destroy();
}

function require_login($redirect_url) {
    if( !isset($_SESSION['sid']) ) {
        redirect_to($redirect_url);
    }
}