<?php

function style($tag) {
    if ($tag == 'h1') {
        echo "style='text-shadow: 2px 2px 2px white;'" ;
    }
}

function enrolled_courses_sql($db) {
    $sql1 = "SELECT enrollment FROM users WHERE sid='";
    $sql1 .= db_escape($db, $_SESSION['sid']). "'";
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

}