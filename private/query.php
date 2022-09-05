<?php

function register_user($user_data, $db) {

    $errors = r_validate_user($user_data, $db);

    if( $errors['present'] ) {
        return $errors;
    } else {

        $hashed_password = password_hash($user_data['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (first_name, last_name, sid, username, password, verified, role) VALUES (";
        $sql.= "'" . db_escape($db, $user_data['first_name']) . "',";
        $sql.= "'" . db_escape($db, $user_data['last_name']) . "',";
        $sql.= "'" . db_escape($db, $user_data['sid']) . "',";
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

function get_approved_courses($db) {
    $sql = "SELECT * FROM courses WHERE approved=1 ORDER BY id DESC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function get_enrolled_courses($db) {
    $sql = "SELECT * FROM courses WHERE ". enrolled_courses_sql($db);
    $sql .= " ORDER BY id DESC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function get_course_by_id($id, $db) {
    $sql = "SELECT * FROM courses WHERE id='" . db_escape($db, $id) . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $course = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $course;
}

function enroll_course($course_id, $db) {

    $sql1 = "SELECT enrollment FROM users WHERE sid='";
    $sql1 .= db_escape($db, $_SESSION['sid']). "'";
    $result1 = mysqli_query($db, $sql1);
    confirm_result_set($result1);
    $enrollment = mysqli_fetch_assoc($result1)['enrollment'] ?? '';
    mysqli_free_result($result1);

    if(empty($enrollment)) {
        $enrollment = db_escape($db, $course_id);
    } else {
        $enrollment = explode(',', $enrollment);
        foreach($enrollment as $course) {
            if($course == $course_id) {
                return false;
            }
        }
        $enrollment = implode(',', $enrollment);
        $enrollment .= db_escape($db, ',' . $course_id);
    }

    $sql2 = "UPDATE users SET ";
    $sql2 .= "enrollment='" . db_escape($db, $enrollment) . "' ";
    $sql2 .= "WHERE sid='" . db_escape($db, $_SESSION['sid']) . "' ";
    $sql2 .= "LIMIT 1";
    $result2 = mysqli_query($db, $sql2);

    if($result2) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }

}

function get_units_by_cid($db, $cid) {
    $sql = "SELECT * FROM units WHERE course_id='". db_escape($db, $cid) . "'";
    $sql .= " ORDER BY unit_number ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function get_item($db, $id) {
    $sql = "SELECT * FROM items WHERE id='". db_escape($db, $id) . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $item = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $item;
}

function get_items_by_uid($db, $uid) {
    $sql = "SELECT * FROM items WHERE unit_id='". db_escape($db, $uid) . "'";
    $sql .= " ORDER BY item_number ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function course_link($course, $db) {
    $sql1 = "SELECT * FROM units WHERE course_id='";
    $sql1 .= db_escape($db, $course['id']) . "' AND unit_number=1";
    $result1 = mysqli_query($db, $sql1);
    confirm_result_set($result1);
    $unit = mysqli_fetch_assoc($result1);
    mysqli_free_result($result1);

    $sql2 = "SELECT * FROM items WHERE unit_id='";
    $sql2 .= db_escape($db, $unit['id']) . "' AND item_number=1";
    $result2 = mysqli_query($db, $sql2);
    confirm_result_set($result2);
    $item = mysqli_fetch_assoc($result2);
    mysqli_free_result($result2);

    return "courses/courseplayer.php?cid=" .  (string) $course['id'] . "&uid=" . (string) $unit['id'] . "&iid=" . (string) $item['id'];
}

function user_roles($username, $db) {
    $sql = "SELECT * FROM users WHERE username='";
    $sql .= $username . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $roles = mysqli_fetch_assoc($result)['role'] ?? '';
    mysqli_free_result($result);
    return $roles;
}