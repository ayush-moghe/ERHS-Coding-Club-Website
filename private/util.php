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
    for ($i = 1; $i < count($enrolled_courses) - 1; $i++) {
        $sql .= " OR id='" . $enrolled_courses[$i] . "'";
    }

    return $sql;

}