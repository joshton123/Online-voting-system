<?php

    session_start();

    include("connect.php");
    $admin = $_POST['admin'];
    $password = $_POST['password'];

    $check = mysqli_query($connect , "SELECT * FROM admindetail WHERE admin='$admin' AND password = '$password'");

    if(mysqli_num_rows($check) >0 )
    {
        $userdata = mysqli_fetch_array($check);
        $groups = mysqli_query($connect , "SELECT * FROM user WHERE role=2");
        $groupdata = mysqli_fetch_all($groups , MYSQLI_ASSOC);

        $_SESSION['userdata'] = $userdata;
        $_SESSION['groupdata'] = $groupdata;

        echo '
        <script>
        window.location = "../routes/dashboard1.php";
        </script>';

    }
    else
    {
        echo '
        <script>
        alert("INVALID CREDENTIALS-1");
        window.location = "../routes/adminreg.php";
        </script>';
    }

?>


