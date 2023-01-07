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

function register_teacher($user_data, $db) {

    $errors = r_validate_teacher($user_data, $db);

    if($errors['present']) {
        return $errors;
    } else {
        $hashed_password = password_hash($user_data['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (first_name, last_name, sid, username, password, verified, role) VALUES (";
        $sql.= "'" . db_escape($db, $user_data['first_name']) . "',";
        $sql.= "'" . db_escape($db, $user_data['last_name']) . "',";
        $sql.= "'" . 'Teacher' . "',";
        $sql.= "'" . db_escape($db, $user_data['username']) . "',";
        $sql.= "'" . db_escape($db, $hashed_password) . "',";
        $sql.= "0,";
        $sql.= "'teacher,member')";

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

function teacher_login($user_data, $db) {

    $username = $user_data['username'] ?? '';
    $password = $user_data['password'] ?? '';

    $sql = "SELECT * FROM users WHERE username='";
    $sql.= db_escape($db, $username) . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $fetched_data = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    $fetched_username = $fetched_data['username'] ?? '';
    $fetched_password = $fetched_data['password'] ?? '';

    if( $fetched_username === $username && password_verify($password, $fetched_password)) {
        login_teacher($fetched_data);
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

    $sql1 = "SELECT enrollment FROM users WHERE username='";
    $sql1 .= db_escape($db, $_SESSION['username']). "'";
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
    $sql2 .= "WHERE username='" . db_escape($db, $_SESSION['username']) . "' ";
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

function get_unit($db, $id) {
    $sql = "SELECT * FROM units WHERE id='". db_escape($db, $id) . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $unit = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $unit;
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

function all_users($db) {
    $sql = "SELECT * FROM users";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function update_verification($db, $uid) {

    $sql = "SELECT verified FROM users WHERE id='" . db_escape($db, $uid) . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $verified = mysqli_fetch_assoc($result)['verified'] ?? '0';
    mysqli_free_result($result);

    if($verified == 0) {
        $sql_verify = "UPDATE users SET verified=1 WHERE id='" . db_escape($db, $uid) . "'";
        $result_verify = mysqli_query($db, $sql_verify);
    } elseif($verified == 1) {
        $sql_unverify = "UPDATE users SET verified=0 WHERE id='" . db_escape($db, $uid) . "'";
        $result_unverify = mysqli_query($db, $sql_unverify);
    }

}

function create_course($db, $course_name, $course_description) {
    $sql = "INSERT INTO courses (course_name, author, approved, description) ";
    $sql .= "VALUES ('" . db_escape($db, $course_name) . "', '";
    $sql .= db_escape($db, $_SESSION['username']) . "', '";
    $sql .= db_escape($db, 0) . "', '";
    $sql .= db_escape($db, $course_description) . "')";
    $result = mysqli_query($db, $sql);
    if($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function all_courses($db) {
    $sql = "SELECT * FROM courses";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function add_unit($db, $cid, $unit_name) {
    $sql = "INSERT INTO units (unit_name, unit_number, course_id) ";
    $sql .= "VALUES ('" . db_escape($db, $unit_name) . "', '";
    $sql .= db_escape($db, total_units($db, $cid) + 1 ) . "', '";
    $sql .= db_escape($db, $cid) . "')";
    $result = mysqli_query($db, $sql);
    if($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function edit_unit($db, $uid, $unit_name) {
    $sql = "UPDATE units SET unit_name='" . db_escape($db, $unit_name) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $uid) . "'";
    $result = mysqli_query($db, $sql);
    if($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function add_video($db, $cid, $uid, $video_name, $video_url, $video_desc, $unit_number) {
    $sql = "INSERT INTO items (item_name, item_number, unit_id, course_number,type, content, item_description, unit_number) ";
    $sql .= "VALUES ('" . db_escape($db, $video_name) . "', '";
    $sql .= db_escape($db, total_items($db, $cid, $uid) + 1 ) . "', '";
    $sql .= db_escape($db, $uid) . "', '";
    $sql .= db_escape($db, $cid) . "', '";
    $sql .= db_escape($db, 'VID') . "', '";
    $sql .= db_escape($db, getYoutubeEmbedUrl($video_url)) . "', '";
    $sql .= db_escape($db, $video_desc) . "', '";
    $sql .= db_escape($db, $unit_number) . "')";
    $result = mysqli_query($db, $sql);
    if($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }

}

function edit_video($db, $video_id, $video_name, $video_url, $video_desc) {

    $target_video = get_item($db, $video_id);
    if( str_replace(' ', '', $video_name) == '') {
        $video_name = $target_video['item_name'];
    }
    if( str_replace(' ', '', $video_url)== '') {
        $video_url = $target_video['content'];
    }
    if( str_replace(' ', '', $video_desc) == '') {
        $video_desc = $target_video['item_description'];
    }
    $sql = "UPDATE items SET item_name='" . db_escape($db, $video_name) . "', ";
    $sql .= "content='" . db_escape($db, getYoutubeEmbedUrl($video_url)) . "', ";
    $sql .= "item_description='" . db_escape($db, $video_desc) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $video_id) . "'";
    $result = mysqli_query($db, $sql);
    if($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }


}

function add_quiz($db, $cid, $uid, $quiz_name, $quiz_url, $quiz_desc, $unit_number) {
    $sql = "INSERT INTO items (item_name, item_number, unit_id, course_number,type, content, item_description, unit_number) ";
    $sql .= "VALUES ('" . db_escape($db, $quiz_name) . "', '";
    $sql .= db_escape($db, total_items($db, $cid, $uid) + 1 ) . "', '";
    $sql .= db_escape($db, $uid) . "', '";
    $sql .= db_escape($db, $cid) . "', '";
    $sql .= db_escape($db, 'QUIZ') . "', '";
    $sql .= db_escape($db, convertQuizEmbedded($quiz_url) ) . "', '";
    $sql .= db_escape($db, $quiz_desc) . "', '";
    $sql .= db_escape($db, $unit_number) . "')";
    $result = mysqli_query($db, $sql);
    if($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }

}

function edit_quiz($db, $quiz_id, $quiz_name, $quiz_url, $quiz_desc)
{

    $target_quiz = get_item($db, $quiz_id);
    if (str_replace(' ', '', $quiz_name) == '') {
        $quiz_name = $target_quiz['item_name'];
    }
    if (str_replace(' ', '', $quiz_url) == '') {
        $quiz_url = $target_quiz['content'];
    }
    if (str_replace(' ', '', $quiz_desc) == '') {
        $quiz_desc = $target_quiz['item_description'];
    }
    $sql = "UPDATE items SET item_name='" . db_escape($db, $quiz_name) . "', ";
    $sql .= "content='" . db_escape($db, convertQuizEmbedded($quiz_url)) . "', ";
    $sql .= "item_description='" . db_escape($db, $quiz_desc) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $quiz_id) . "'";
    $result = mysqli_query($db, $sql);
    if ($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}