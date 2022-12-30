<?php

function style($tag) {
    if ($tag == 'h1') {
        echo "style='text-shadow: 2px 2px 2px white;'" ;
    }
}

function enrolled_courses_sql($db) {
    $sql1 = "SELECT enrollment FROM users WHERE username='";
    $sql1 .= db_escape($db, $_SESSION['username']). "'";
    $result1 = mysqli_query($db, $sql1);
    confirm_result_set($result1);
    $enrollment = mysqli_fetch_assoc($result1)['enrollment'] ?? '';
    mysqli_free_result($result1);

    $enrolled_courses = explode(',', $enrollment);
    $sql = "id='" . $enrolled_courses[0] . "'";
    for ($i = 1; $i < count($enrolled_courses); $i++) {
        $sql .= " OR id='" . $enrolled_courses[$i] . "'";
    }

    return $sql;

}

function role_html($color, $name) {
    return '<div class="h3 mt-5 ps-1 pe-1 ps-1 pe-1 d-inline-block me-2 mb-4" style="border-radius: 8px; border: 3px solid ' . $color . '; color: ' . $color . ';"><i class="bi bi-gem"></i>' . $name . '</div>';
}

function display_role($role) {

    if($role == 'student') {
        echo role_html('white', 'Student');
    }

    if($role == 'admin') {
        echo role_html('lawngreen', 'Admin');
    }

    if($role == 'president') {
        echo role_html('gold', 'President');
    }

    if($role == 'vicepresident') {
        echo role_html('orange', 'Vice President');
    }

    if($role == 'secretary') {
        echo role_html('blue', 'Secretary');
    }

    if($role == 'treasurer') {
        echo role_html('green', 'Treasurer');
    }

    if($role == 'officer') {
        echo role_html('black', 'Officer');
    }

    if($role == 'historian') {
        echo role_html('brown', 'Historian');
    }

    if($role == 'teacher') {
        echo role_html('grey', 'Teacher');
    }

}

function total_units($db, $cid) {
    $sql = "SELECT * FROM units WHERE course_id='" . db_escape($db, $cid) . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $total = mysqli_num_rows($result);
    mysqli_free_result($result);
    return $total;
}

function getYoutubeID($url) {
    $parts = parse_url($url);
    if(isset($parts['query'])){
        parse_str($parts['query'], $qs);
        if(isset($qs['v'])){
            return $qs['v'];
        }else if(isset($qs['vi'])){
            return $qs['vi'];
        }
    }
    if(isset($parts['path'])){
        $path = explode('/', trim($parts['path'], '/'));
        return $path[count($path)-1];
    }
    return false;
}

function getYoutubeEmbedUrl($url) {
    $id = getYoutubeID($url);
    return 'https://www.youtube.com/embed/' . $id;
}

function total_items($db, $cid, $uid) {
    $sql = "SELECT * FROM items WHERE course_number='" . db_escape($db, $cid) . "' AND unit_id='" . db_escape($db, $uid) . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $total = mysqli_num_rows($result);
    mysqli_free_result($result);
    return $total;
}