<?php
session_start();
include "../db_conn.php";
if (isset($_POST['search'])) {
    $data = $_POST['search'];
    $result = mysqli_query($db, "SELECT * FROM users WHERE id='$data' OR fname='$data'");
    if (mysqli_num_rows($result) <= 0) {
        header("Location: ../feedback.php?error=No user found");
        exit();
    }
    $result_concern = mysqli_query($db, "SELECT * FROM users WHERE id='$data' OR fname='$data'");
    while ($row1 = mysqli_fetch_array($result_concern)) {
        $sf = $row1['fname'];
        $sm = $row1['m_initial'];
        $sl = $row1['lname'];
        $sid = $row1['id'];
        $sw = $row1['wantoshare'];
        $sh = $row1['hobbies'];
        $si = $row1['interest'];
        $sfav = $row1['favourites'];
        $sa = $row1['achievements'];
    }
}
?>